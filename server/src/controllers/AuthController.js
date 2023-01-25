const createError = require("../middleware/error/createError");
const LoginService = require("../services/Auth/LoginService");
const RegisterService = require("../services/Auth/RegisterService");
const Register = async (req, res, next) => {
  try {
    const response = await RegisterService(req.body);
    console.log(response);
    res.status(response.status).json(response);
  } catch (error) {
    createError(error);
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

module.exports = {
  Register,
  Login,
};
