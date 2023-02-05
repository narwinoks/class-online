const { Order } = require("../../models");
module.exports = async (req) => {
  const userId = req.user.data.id;
  const orders = await Order.findAll({ where: { user_id: userId } });
  return { status: 200, success: true, message: "successfully", data: orders };
};
