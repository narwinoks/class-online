const router = require("express").Router();
const verifyToken = require("../middleware/auth/checkToken");

router.get("/", verifyToken, (req, res) => {
  res.status(200).json({ message: "Success" });
});

module.exports = router;
