const router = require("express").Router();
const CheckToken = require("../middleware/auth/checkToken");
const ReviewController = require("../controllers/ReviewController");

router.get("/", ReviewController.get);
router.post("/", CheckToken, ReviewController.save);
router.put("/:id", CheckToken, ReviewController.save);
router.delete("/:id", CheckToken, ReviewController.save);
router.get("/:id", CheckToken, ReviewController.show);

module.exports = router;
