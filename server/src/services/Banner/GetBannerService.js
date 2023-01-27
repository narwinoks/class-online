const { Banner } = require("../../models");
module.exports = async (data) => {
  if (data.query.type) {
    var banner = await Banner.findAll({ where: { type: data.query.type } });
  } else {
    var banner = await Banner.findAll();
  }
  return { success: true, status: 200, message: "successfully", data: banner };
};
