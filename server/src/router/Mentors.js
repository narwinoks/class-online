const router = require("express").Router();
const Validator = require("../middleware/validations/mentor/Validations");
const MentorController = require("../controllers/MentorController");
const CheckToken = require("../middleware/auth/checkToken");

router.delete("/:id", CheckToken, MentorController.destroy);
router.get("/:id", MentorController.show);
router.get("/", MentorController.get);
router.post("/", CheckToken, Validator, MentorController.save);
router.put("/:id", CheckToken, Validator, MentorController.update);

module.exports = router;
