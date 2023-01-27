const { Category } = require("../../models");
module.exports = async (id) => {
  const category = await Category.findByPk(id);
  //   category.destroy();
  category.destroy();
  return { status: 200, success: true, message: "successfully" };
};
