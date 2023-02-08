const { Roadmap } = require("../../models");
module.exports = async (request) => {
  console.log(request.body);
  const roadmap = await Roadmap.create(request.body);
  return {
    status: 200,
    success: true,
    message: "successfully",
    data: roadmap,
  };
};
