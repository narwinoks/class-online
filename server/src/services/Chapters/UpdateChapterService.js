const { Chapters, Courses } = require("../../models");
module.exports = async (req) => {
  const course_id = req.body.course_id;
  const chapter = await Chapters.findByPk(req.params.id);
  if (!chapter)
    return { status: 404, success: false, message: "data not found" };

  const course = await Courses.findByPk(course_id);
  if (!course)
    return { status: 404, success: false, message: "Course not found" };

  chapter.update(req.body);
  return { status: 200, success: true, message: "successfully", data: chapter };
};
