const { Lessons } = require("../../models");
module.exports = async (req) => {
  const lesson_id = req.params.id;
  const lesson = await Lessons.findByPk(lesson_id);
  if (!lesson) {
      return { status: 404, success: false, message: "lesson not found" };
  }
  return { status: 200, success: true, message: "successfully", data: lesson };
};
