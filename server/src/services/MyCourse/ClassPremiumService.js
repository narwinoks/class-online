const { MyCourses } = require("../../models");
module.exports = async (req) => {
  const user_id = req.user.data.id;
  const myCourse = await MyCourses.create({
    user_id: user_id,
    ...req.body,
  });
  return {
    status: 200,
    success: true,
    message: "successfully",
    data: myCourse,
  };
};
