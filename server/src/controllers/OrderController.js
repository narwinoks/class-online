const GetOrderService = require("../services/Order/GetOrderService");
const SaveOrderService = require("../services/Order/SaveOrderService");
const get = async (req, res, next) => {
  try {
    const response = await GetOrderService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const save = async (req, res, next) => {
  try {
    const response = await SaveOrderService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const webhook = (req, res, next) => {};

module.exports = {
  get,
  save,
  webhook,
};
