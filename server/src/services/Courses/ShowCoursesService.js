const {
  Courses,
  Chapters,
  Lessons,
  Mentor,
  Reviews,
  User,
} = require("../../models");

module.exports = async (slug) => {
  const course = await Courses.findOne({
    where: { slug: slug },
    include: [
      {
        model: Chapters,
        include: [
          {
            model: Lessons,
          },
        ],
        order: [["id", "ASC"]],
      },
      {
        model: Mentor,
      },
    ],
  });

  const reviews = await Reviews.findAll({
    where: { course_id: course.id },
    order: [["id", "DESC"]],
    attributes: ["id", "rating"],
    include: [
      {
        model: User,
        attributes: ["name", "avatar"],
      },
    ],
  });

  course.setDataValue("Reviews", reviews);

  return {
    status: 200,
    success: true,
    message: "successfully",
    data: course,
  };
};
