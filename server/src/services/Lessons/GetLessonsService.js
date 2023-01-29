const { Lessons, Sequelize } = require("../../models");
const Op = Sequelize.Op;
module.exports = async (req) => {
  const chapter_id = req.query.chapter_id;
  const paramQuerySQL = {};

  // filtering by category
  if (chapter_id !== "" && typeof chapter_id !== "undefined") {
    const query = chapter_id;
    paramQuerySQL.where = {
      chapter_id: query,
    };
  }
  const lessons = await Lessons.findAll(paramQuerySQL);
  if (!lessons.length)
    return { status: 404, success: true, message: "empty data" };
  return { status: 200, success: true, message: "successfully", data: lessons };
};
