const { Chapters } = require("../../models");
module.exports = async (id) => {
  const chapter = await Chapters.findByPk(id);
  if (!chapter)
    return { status: 404, success: false, message: "data not found" };
  chapter.destroy();
  return { status: 200, success: true, message: "successfully" };
};
