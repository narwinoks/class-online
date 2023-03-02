const { Banner } = require("../../models");
module.exports = async (id) => {
  const banner = await Banner.findByPk(id);
  if (!banner)
    return { status: 404, success: false, message: "data not found" };
  return { status: 200, success: true, message: "successfully", data: banner };
};
