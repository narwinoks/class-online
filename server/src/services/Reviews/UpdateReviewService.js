const { Reviews } = require("../../models");

module.exports = async (req) => {
  const review = await Reviews.findByPk(req.params.id);
  if (!review)
    return { status: 404, success: false, message: "data not found" };
  review.update(req.body);
  return { status: 200, success: true, message: "successfully", data: review };
};
