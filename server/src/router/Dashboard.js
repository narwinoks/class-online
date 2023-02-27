const router = require("express").Router();
const DashboardController = require("../controllers/DashboardController");
const checkToken = require("../middleware/auth/checkToken");
router.get("/", checkToken, DashboardController.get);
module.exports = router;
