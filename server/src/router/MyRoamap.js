const router = require("express").Router();
const checkToken = require("../middleware/auth/checkToken");
const MyRoadmapContoller = require("../controllers/MyRoamapController");

router.get("/", checkToken, MyRoadmapContoller.get);
router.post("/", checkToken, MyRoadmapContoller.save);

module.exports = router;
