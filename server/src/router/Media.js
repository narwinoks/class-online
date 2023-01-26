const router = require("express").Router();
const mediaController = require("../controllers/MediaController");

router.post("/", mediaController.store);

module.exports = router;
