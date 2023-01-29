const router = require("express").Router();
const LessonController = require("../controllers/LessonController");
const Validators = require("../middleware/validations/Lessons/PostValidation");
const CheckToken = require("../middleware/auth/checkToken");

router.get("/", LessonController.get);
router.get("/:id", LessonController.show);
router.delete("/:id", CheckToken, LessonController.destroy);
router.put("/:id", CheckToken, Validators, LessonController.edit);
router.post("/", CheckToken, Validators, LessonController.save);

module.exports = router;
