const { Courses, Chapters, Lessons } = require("../../models");
module.exports = async (slug) => {
  const course = await Courses.findOne({
    where: { slug: slug },
    include: [
      {
        model: Chapters,
        include: {
          model: Lessons,
        },
      },
    ],
  });

  return { status: 200, success: true, message: "successfully", data: course };
};
