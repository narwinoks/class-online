const { Category, Courses, Sequelize } = require("../../models");
module.exports = async () => {
  const response = await Category.findAll({
    attributes: {
      include: [
        [Sequelize.fn("COUNT", Sequelize.col("Courses.id")), "categoryCount"],
      ],
    },
    include: [
      {
        model: Courses,
        attributes: [],
      },
    ],
    duplicating: false,
    group: ["Category.id"],
  });
  if (!response.length)
    return { status: 404, success: true, message: "empty data" };
  return {
    status: 200,
    success: true,
    message: "successfully",
    data: response,
  };
};
