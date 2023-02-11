const { MyRoadmap, MyCourses, Roadmap, Courses } = require("../../models");
const SaveOrderRoadMapService = require("../Order/SaveOrderRoadMapService");
module.exports = async (req) => {
  const userId = req.user.data.id;
  const roadmapId = req.body.roadmap_id;
  const roadMap = await Roadmap.findByPk(roadmapId);
  if (!roadMap) {
    return { status: 404, message: "Roadmap not found" };
  }
  const courses = await Courses.findAll({
    where: { roadmap_id: 1 },
  });
  if (roadMap.type == "free") {
    const myRoadMap = await MyRoadmap.create({
      user_id: userId,
      roadmap_id: roadmapId,
    });
    const dataInsert = [];
    courses.forEach((element) => {
      dataInsert.push({
        user_id: userId,
        course_id: element.id,
      });
    });
    await MyCourses.bulkCreate(dataInsert);
    return {
      status: 200,
      success: true,
      message: "successfully",
      data: myRoadMap,
    };
  }
  // CHECK PRICE 0
  if (roadMap.price == 0) {
    return { status: 400, success: false, message: "roadmap price 0" };
  }
  // CALL SERVICE ORDER PAYMENTS
  const orders = await SaveOrderRoadMapService({
    roadMap: roadMap,
    user: req.user.data,
  });
  return { status: 200, success: true, message: "successfully", data: orders };
};
