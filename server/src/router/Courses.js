const router = require("express").Router();
const CourseController = require("../controllers/CoursesController");
const ValidatorPost = require("../middleware/validations/Courses/Post");
const CheckToken = require("../middleware/auth/checkToken");

router.get("/", CourseController.get);
router.get("/:slug", CourseController.show);
router.post("/", CheckToken, ValidatorPost, CourseController.save);
router.put("/:id", CheckToken, ValidatorPost, CourseController.edit);
router.delete("/:id", CheckToken, CourseController.destroy);

module.exports = router;
