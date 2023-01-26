const ProfileService = require("../services/User/ProfileService");
const UserUpdateProfile = require("../services/User/UserUpdateService");
// GET PROFILE
const profile = async (req, res, next) => {
  try {
    const data = await ProfileService(req);
    res.json({ message: "success", data: data });
  } catch (error) {
    next(error);
  }
};
// UPDATE PROFILE
const updateProfile = async (req, res, next) => {
  try {
    const data = await UserUpdateProfile(req);
    // console.log(data);
    res.status(data.status).json(data);
  } catch (error) {
    next(error);
  }
};
module.exports = {
  profile,
  updateProfile,
};
