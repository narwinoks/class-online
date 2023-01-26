const { User } = require("../../models");
const bcrypt = require("bcrypt");

module.exports = async (data) => {
  const userId = data.user.data.id;
  const user = await User.findByPk(userId);
  if (data.body.password != data.body.confirm_password) return {success: false ,status :404 ,message :"password not match"};
  const passwordOld = await bcrypt.compare(data.body.password_old,user.password);
  if(!passwordOld) return { success: false, status: 404, message: "Invalid Password Old" };
  const newPassword = await bcrypt.hash(data.body.password,10);
  const updated =await user.update({
    password :newPassword,
  });
  return { success: true, status: 200, message: "Successfully" };
};
