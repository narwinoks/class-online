const { Category } = require("../../models");
module.exports = async (id) => {
  const category = await Category.findByPk(id);
  if(!category) return { status: 404, success: true, message: "data not found"}
   return { status: 200, success: true, message: "successfully" ,data:category };
};
