const { Lessons } = require("../../models");
module.exports = async (id) => {
  const lesson = await Lessons.findByPk(id);
  if (!lesson)  return {status:404 ,success:false ,message :"data not found"}
  lesson.destroy()
  return { status: 200, success: true, message: "successfully" };
};
