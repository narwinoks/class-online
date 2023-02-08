const { Roadmap } = require("../../models");
module.exports = async (request) => {
  const roadmap = await Roadmap.findByPk(request.params.id);
  console.log(roadmap);
  if (!roadmap)
    return { status: 404, success: false, message: "data not found" };
  roadmap.update(request.body);
  return { status: 200, success: true, message: "successfully", data: roadmap };
};
