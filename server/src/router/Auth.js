const router = require("express").Router();
const AuthController = require("../controllers/AuthController.js");
const ValidatorRegistry = require("../middleware/validations/Auth/Register");
const ValidationLogin = require("../middleware/validations/Auth/Login");
const verifyToken = require("../middleware/auth/checkToken");

router.post("/login", ValidationLogin, AuthController.Login);
router.post("/register", ValidatorRegistry, AuthController.Register);
router.delete("/logout", verifyToken, AuthController.Logout);
router.get("/refresh-token", verifyToken, AuthController.RefreshToken);

module.exports = router;
