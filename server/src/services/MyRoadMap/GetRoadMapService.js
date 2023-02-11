const { MyRoadmap, Roadmap } = require("../../models");
module.exports = async (req) => {
  const userId = req.user.data.id;
  const myRoadMap = await MyRoadmap.findAll({
    where: { user_id: userId },
    include: [
      {
        model: Roadmap,
        attributes: ["id", "name"],
      },
    ],
    attributes: ["id", "createdAt", "updatedAt"],
  });
  return {
    status: 200,
    success: true,
    message: "successfully",
    data: myRoadMap,
  };
};
