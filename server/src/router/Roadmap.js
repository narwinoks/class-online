const router = require("express").Router();
const RoadMapController = require("../controllers/RoadmapController");
const CheckToken = require("../middleware/auth/checkToken");
const ValidationPost = require("../middleware/validations/roadmap/Post");

router.get("/", RoadMapController.get);
router.get("/:id", RoadMapController.show);
router.post("/", CheckToken, ValidationPost, RoadMapController.save);
router.put("/:id", CheckToken, RoadMapController.edit);
router.delete("/:id", CheckToken, RoadMapController.destroy);

module.exports = router;
