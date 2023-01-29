const { Lessons } = require("../../models");
module.exports = async (req) => {
  const lesson = await Lessons.findByPk(req.params.id);
  if (!lesson)
    return { status: 404, success: false, message: "data not found" };
  lesson.update(req.body);
  return { status: 200, success: true, message: "successfully", data: lesson };
};
