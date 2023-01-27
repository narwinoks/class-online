const { Banner } = require("../../models");
module.exports = async (data) => {
  const model = await Banner.create({
    image: data.body.image,
    type: data.body.type,
    title: data.body.title,
    description: data.body.description,
  });
  return { status: 200, success: true, message: "successfully", data: model };
};
