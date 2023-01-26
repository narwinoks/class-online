const { User } = require("../../models");
module.exports = async (data) => {
  const user_id = data.user.data.id;
  const user = await User.findByPk(user_id, {
    attributes: ["id", "email", "name", "admin", "avatar"],
  });
  return user;
};
