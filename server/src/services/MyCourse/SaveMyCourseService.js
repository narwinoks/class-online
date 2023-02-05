const { MyCourses, Courses,User } = require("../../models");
const SaveOrderService = require("../../services/Order/SaveOrderService");

module.exports = async (req) => {
  const user_id = req.user.data.id;
  const course = await Courses.findByPk(req.body.course_id);
  const user = await User.findByPk(user_id);
  if (!course)
    return { status: 404, success: false, message: "course not found" };

  // CHECK DUPLICATE MY COURSES
  const duplicate = await MyCourses.findOne({
    where: { user_id: user_id, course_id: req.body.course_id },
  });
  if (duplicate)
    return { status: 419, success: false, message: "course already exists" };

  //CLASS PREMIUM
  if (course.type == "premium") {
    // CHECK PRICE 0
    if (course.price == 0) {
      return { status: 400, success: false, message: "course price 0" };
    }
    // CALL SERVICE ORDER PAYMENTS
    const orders =await SaveOrderService({ course: course, user: user });
    return {status :200 ,success: true, message :"successfully" ,data : orders}
  }

  const myCourse = await MyCourses.create({
    user_id: user_id,
    course_id: req.body.course_id,
  });
  return {
    status: 200,
    success: true,
    message: "successfully",
    myCourse
  };
};
