const { Chapters, Courses } = require("../../models");

module.exports = async (req) => {
  const course_id = req.body.course_id;
  const course = await Courses.findByPk(course_id);
  if (!course)
    return { status: 404, success: false, message: "Course not found" };
  const chapters = await Chapters.create(req.body);
  return { status: 200, success: true, message: "successfully", data:chapters };
};
