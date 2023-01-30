const { Roadmap, Courses, Sequelize } = require("../../models");
const db = require("../../models");
module.exports = async (data) => {
  const roadmps = await Roadmap.findAll({
    attributes: {
      include: [
        [Sequelize.fn("COUNT", Sequelize.col("Courses.id")), "coursesCount"],
      ],
    },
    include: [
      {
        model: Courses,
        attributes: [],
      },
    ],
    duplicating: false,
    group: ["Roadmap.id"],
  });
  return {
    status: 200,
    success: true,
    message: "successfully",
    data: roadmps,
  };
};
