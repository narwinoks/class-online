const router = require("express").Router();
const CheckToken = require("../middleware/auth/checkToken");
const ReviewController = require("../controllers/ReviewController");

router.post("/", CheckToken, ReviewController.save);
router.put("/:id", CheckToken, ReviewController.edit);
router.delete("/:id", CheckToken, ReviewController.destroy);

module.exports = router;
