const router = require("express").Router();
const OrderController = require("../controllers/OrderController");
const checkToken = require("../middleware/auth/checkToken");

router.get("/", checkToken, OrderController.get);
router.post("/", checkToken, OrderController.save);
module.exports = router;
