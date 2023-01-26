const { User, RefreshToken } = require("../../models");
module.exports = async (data) => {
  const userId = data.user.data.id;
  const user = await User.findByPk(userId);
  if (!user) return { status: 404, success: false, message: "User not found" };
  await RefreshToken.destroy({ where: { user_id: userId } });
  return { status: 200, success: true, message: "Logout success" };
};
