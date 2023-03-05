const { Courses } = require("../../models");
module.exports = async (id) => {
  const course = await Courses.findByPk(id);
  if (!course)
    return { status: 404, success: false, message: "data not found" };
  return { status: 200, success: true, message: "successfully", data: course };
};
