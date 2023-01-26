const { User } = require("../../models");
module.exports = async (data) => {
  const id = data.user.data.id;
  const user = await User.findByPk(id);
  if (!user) return { status: 404, success: false, message: "User Not Found" };
  const update = await user.update({
    name: data.body.name,
    avatar: data.body.avatar,
  });
  const response ={
    id :update.id,
    name : update.name,
    email:update.email,
    avatar : update.avatar
  }
  // console.log(update);
  return { status: 200, success: true, message: "profile updated", data: response };
};
