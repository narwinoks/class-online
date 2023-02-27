const { MyRoadmap, MyCourses } = require("../../models");
module.exports = async (req) => {
  const user_id = req.user.data.id;
  const roadmap = await MyRoadmap.count({ where: { user_id: user_id } });
  const course = await MyCourses.count({ where: { user_id: user_id } });

  return {status :200 ,success:true ,message:"successfully",data:{roadmap,course}}
};
