const { Category } = require("../../models");
module.exports = async (request) => {
  const data = await Category.create({
    logo: request.body.logo,
    name: request.body.name,
  });
  return { status: 200, success: true, message: "successfully", data: data };
};
