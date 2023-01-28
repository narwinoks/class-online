const { Roadmap, Courses } = require("../../models");
module.exports = async (data) => {
  const roadmps = await Roadmap.findAll({
    include: [
      {
        model: Courses,
      },
    ],
  });
  return {
    status: 200,
    success: true,
    message: "successfully",
    data: roadmps,
  };
};
