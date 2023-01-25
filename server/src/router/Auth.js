const router = require("express").Router();
const AuthController = require("../controllers/AuthController.js");
const ValidatorRegistry = require("../middleware/validations/Auth/Register");
const ValidationLogin = require("../middleware/validations/Auth/Login");

router.post("/login", ValidationLogin, AuthController.Login);
router.post("/register", ValidatorRegistry, AuthController.Register);

module.exports = router;
