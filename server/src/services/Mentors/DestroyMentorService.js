const { Mentor } = require("../../models");

module.exports = async (id) => {
  const mentor = await Mentor.findByPk(id);
  if(!mentor) return {status :404 ,success :false ,message :"data not found"}
  mentor.destroy();
  return { status: 200, success: true, message: "successfully" };
};
