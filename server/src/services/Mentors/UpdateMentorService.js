const { Mentor } = require("../../models");

module.exports = async (req) => {
  const mentor_id = req.params.id;
  const mentor = await Mentor.findByPk(mentor_id);
  if (!mentor)
    return { status: 404, success: false, message: "data not found" };
  mentor.update(req.body);
  return { status: 200, success: true, message: "successfully", data: mentor };
};
