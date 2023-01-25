const router = require("express").Router();
const AuthController = require("../controllers/AuthController.js");

router.post("/login", AuthController.Login);
router.post("/register", AuthController.Register);

module.exports = router;
