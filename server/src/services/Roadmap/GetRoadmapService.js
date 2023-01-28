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
  // {
  //   include: [
  //     {
  //       model: Courses,
  //       required: true,
  //     },
  //   ],
  //   // group: ['roadmps.id']
  //   // attributes: ["", "count(*)"],
  // }
  // const courses = await Courses.findAll({ where: { roadmap_id: road } });
  // const response = {
  //   // roadmps: roadmps,
  //   courses: courses,
  // };

  // }
  return {
    status: 200,
    success: true,
    message: "successfully",
    data: roadmps,
  };
};
