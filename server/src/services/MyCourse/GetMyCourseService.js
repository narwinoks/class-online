const { MyCourses, Courses } = require("../../models");
module.exports = async (req) => {
  const user_id = req.user.data.id;
  const myCourse = await MyCourses.findAll({
    where: { user_id: user_id },
    attributes: ["id", "createdAt", "updatedAt"],
    include: [
      {
        model: Courses,
        attributes: ["id", "name", "slug", "thumbnail"],
      },
    ],
  });

  return {
    status: 200,
    success: true,
    message: "successfully",
    data: myCourse,
  };
};
