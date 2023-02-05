const router = require("express").Router();
const WebHookController = require("../controllers/WebhookController");

router.post("/", WebHookController);
module.exports = router;
