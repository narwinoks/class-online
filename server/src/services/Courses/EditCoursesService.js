const { Courses } = require("../../models");
module.exports =async (req) => {
  const id = req.params.id;
  const courses =await Courses.findByPk(id);
  if (!courses) return {status:404 ,success:false ,message:"data not found"};
  courses.update(req.body);
  return { status: 200, success: true, message: "successfully", data: courses};
};
