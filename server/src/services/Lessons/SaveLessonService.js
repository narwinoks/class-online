const { Lessons, Chapters } = require("../../models");
module.exports = async (req) => {
  console.log(req.body);
  const chapter_id = req.body.chapter_id;
  const chapter = await Chapters.findByPk(chapter_id);
  if (!chapter)
    return { status: 404, success: false, message: "data not found" };
  const lesson = await Lessons.create(req.body);
  return { status: 200, success: true, message: "successfully", data: lesson };
};
