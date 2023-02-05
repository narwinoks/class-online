const webhookService = require("../services/WebHook/WebHookService");

module.exports = async (req, res, next) => {
  const response = await webhookService(req);
  res.status(response.status).json(response);
};
