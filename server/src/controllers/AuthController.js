const LoginService = require("../services/Auth/LoginService");
const RegisterService = require("../services/Auth/RegisterService");
const Register = async (req, res, next) => {
  try {
    const response = await RegisterService(req.body);
    res.status(response.status).json(response);
  } catch (error) {
    res.status(500).json({
      message: "Error",
      success: false,
      stack: error.message,
    });
  }
};
const Login = (req, res) => {
  res.json({ success: true, message: "Success", status: "login" });
};

module.exports = {
  Register,
  Login,
};
