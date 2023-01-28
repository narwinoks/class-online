const { Courses } = require("../../models");

module.exports = async (id) => {
  const courses = await Courses.findByPk(id);
  if (!courses)
    return { status: 404, success: false, message: "data not found" };
  courses.destroy();
  return { status: 200, success: true, message: "Successfully" };
};
