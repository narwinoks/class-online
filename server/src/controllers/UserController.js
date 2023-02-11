const ProfileService = require("../services/User/ProfileService");
const UserUpdateProfile = require("../services/User/UserUpdateService");
const ChangePasswordService = require("../services/User/ChangePasswordService");
// GET PROFILE
const profile = async (req, res, next) => {
  try {
    const data = await ProfileService(req);
    res.json({ status: 200, success: true, message: "success", data: data });
  } catch (error) {
    next(error);
  }
};
// UPDATE PROFILE
const updateProfile = async (req, res, next) => {
  try {
    const data = await UserUpdateProfile(req);
    res.status(data.status).json(data);
  } catch (error) {
    next(error);
  }
};
const changePassword = async (req, res, next) => {
  try {
    const response = await ChangePasswordService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
module.exports = {
  profile,
  updateProfile,
  changePassword,
};
