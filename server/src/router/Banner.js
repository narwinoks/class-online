const router = require("express").Router();
const BannerController = require("../controllers/BannerController");
const ValidatorPost = require("../middleware/validations/Banner/BannerPost");
const verify = require("../middleware/auth/checkToken");
router.post("/", verify, ValidatorPost, BannerController.save);
router.get("/", BannerController.get);
router.get("/:id", BannerController.show);
router.delete("/:id", BannerController.destroy);
router.put("/:id", verify, BannerController.edit);

module.exports = router;
