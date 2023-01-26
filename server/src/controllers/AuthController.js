const LoginService = require("../services/Auth/LoginService");
const RegisterService = require("../services/Auth/RegisterService");
const LogoutService = require("../services/Auth/LogoutService");
const RefreshTokenService = require("../services/Auth/RefreshTokenService");
const Register = async (req, res, next) => {
  try {
    const response = await RegisterService(req.body);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const Login = async (req, res, next) => {
  try {
    const response = await LoginService(req.body);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const Logout = async (req, res, next) => {
  try {
    const response = await LogoutService(req);
    res.status(200).json(response);
  } catch (error) {
    next(error);
  }
};

const RefreshToken = async (req, res, next) => {
  try {
    const response = await RefreshTokenService(req);
    res.json(response);
  } catch (error) {
    next(error);
  }
};

module.exports = {
  Register,
  Login,
  Logout,
  RefreshToken,
};
