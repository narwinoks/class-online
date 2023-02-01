const { Reviews } = require("../../models");
module.exports = async (req) => {
  const review = await Reviews.findByPk(req.params.id);
  if (!review)
    return { status: 404, success: false, message: "data not found" };
  review.destroy();
  return { status: 200, success: true, message: "successfully" };
};
