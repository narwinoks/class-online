const { Reviews, Courses } = require("../../models");

module.exports = async (req) => {
  const user_id = req.user.data.id;
  const course = await Courses.findByPk(req.body.course_id);
  if (!course)
    return { status: 404, success: false, message: "Courses not found " };
  const review = await Reviews.create({
    user_id: user_id,
    course_id: req.body.course_id,
    rating: req.body.rating,
    note: req.body.note,
  });
  return { status: 200, success: true, message: "successfully", data: review };
};
