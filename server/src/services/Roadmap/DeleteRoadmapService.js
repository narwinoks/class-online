const { Roadmap } = require("../../models");
module.exports = async (id) => {
  const roadmap = await Roadmap.findByPk(id);
  if (!roadmap) return { status: 404, success: false, message: "data not found" };
  roadmap.destroy();
  return { status: 200, success: true, message: "successfully" };
};
