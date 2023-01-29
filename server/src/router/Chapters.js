const router = require("express").Router();
const ChaptersController = require("../controllers/ChaptersController");
const Validators = require("../middleware/validations/Chapters/Validation");
const CheckToken = require("../middleware/auth/checkToken");

router.get("/", ChaptersController.get);
router.get("/:id", ChaptersController.show);
router.delete("/:id", CheckToken, ChaptersController.destroy);
router.put("/:id", CheckToken, Validators, ChaptersController.edit);
router.post("/", CheckToken, Validators, ChaptersController.save);

module.exports = router;
