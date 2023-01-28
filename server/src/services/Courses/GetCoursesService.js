const { Courses, Sequelize } = require("../../models");
const Op = Sequelize.Op;
module.exports = async (req) => {
  const name = req.query.name;
  const status = req.query.name;
  const paramQuerySQL = {};

  // filtering by category
  if (name !== "" && typeof name !== "undefined") {
    const query = name;
    paramQuerySQL.where = {
      name: { [Op.like]: `%${query}%` },
    };
  }

  if (name !== "" && typeof name !== "undefined") {
    const query = status;
    if (query == "draft" || query === "published") {
      paramQuerySQL.where = {
        status: paramQuerySQL,
      };
    }
  }

  console.info(paramQuerySQL, name);
  const courses = await Courses.findAll(paramQuerySQL);
  if (!courses.length)
    return { status: 404, success: true, message: "empty data" };
  return { status: 200, success: true, message: "successfully", data: courses };
};
