const router = require("express").Router();
const CategoryController = require("../controllers/CategoryController");
const ValidationPost = require("../middleware/validations/Categories/PostCategory");
const verify = require("../middleware/auth/checkToken");

router.get("/", CategoryController.get);
router.post("/", verify, ValidationPost, CategoryController.save);
router.put("/:id", verify, ValidationPost, CategoryController.edit);
router.get("/:id", CategoryController.show);
router.delete("/:id", verify, CategoryController.destroy);

module.exports = router;
