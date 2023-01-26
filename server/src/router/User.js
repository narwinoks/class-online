const router = require("express").Router();
const verifyToken = require("../middleware/auth/checkToken");
const UserController = require("../controllers/UserController");

router.get("/", verifyToken, UserController.profile);
router.put("/", verifyToken, UserController.updateProfile);
router.put("/change-password", verifyToken, UserController.changePassword);

module.exports = router;
