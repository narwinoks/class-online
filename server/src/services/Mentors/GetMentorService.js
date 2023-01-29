const { Mentor } = require("../../models");
module.exports = async (req) => {
  const mentors = await Mentor.findAll();
  if (!mentors)
    return { status: 404, success: false, message: "data not found" };
  return { status: 200, success: true, message: "successfully", data: mentors };
};
