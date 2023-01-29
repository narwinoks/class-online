const { Mentor } = require("../../models");
module.exports = async (req) => {
  const mentor = await Mentor.create(req.body);
  return { status: 200, success: true, message: "successfully", data: mentor };
};
