const { Chapters, Sequelize } = require("../../models");
const Op = Sequelize.Op;
module.exports = async (req) => {
  const courses_id = req.query.course_id;
  const paramQuerySQL = {};

  // filtering by category
  if (courses_id !== "" && typeof courses_id !== "undefined") {
    const query = courses_id;
    console.log(query);
    paramQuerySQL.where = {
      course_id: query,
    };
  }
  const courses = await Chapters.findAll(paramQuerySQL);
  if (!courses.length)
    return { status: 404, success: true, message: "empty data" };
  return { status: 200, success: true, message: "successfully", data: courses };
};
