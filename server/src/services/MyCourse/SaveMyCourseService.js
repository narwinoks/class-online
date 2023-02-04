const { MyCourses, Courses } = require("../../models");
module.exports = async (req) => {
  const user_id = req.user.data.id;
  const course = await Courses.findByPk(req.body.course_id);
  if (!course)
    return { status: 404, success: false, message: "course not found" };

  const duplicate = await MyCourses.findOne({
    where: { user_id: user_id, course_id: req.body.course_id },
  });
  if (duplicate)
    return { status: 419, success: false, message: "course already exists" };

  if (course.type == "premium") {
    return { status: 200, success: true, message: " course premium" };
  }

  const myCourse = await MyCourses.create({
    user_id: user_id,
    course_id: req.body.course_id,
  });
  return {
    status: 200,
    success: true,
    message: "successfully",
    data: myCourse,
  };
};
