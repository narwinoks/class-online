const { MyRoadmap, MyCourses, Roadmap, Courses } = require("../../models");
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
  return { status: 200, success: true, message: "successfully", data: courses };
};
