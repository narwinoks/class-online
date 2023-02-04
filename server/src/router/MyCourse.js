const router = require("express").Router();
const MyCourseController = require("../controllers/MyCoursesController");
const CheckToken = require("../middleware/auth/checkToken");

router.get("/", CheckToken, MyCourseController.get);
router.post("/", CheckToken, MyCourseController.save);
router.post("/class-premium", CheckToken, MyCourseController.classPremium);

module.exports = router;
