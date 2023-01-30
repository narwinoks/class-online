const SaveReviewService = require("../services/Reviews/SaveReviewService");
const get = (req, res, next) => {
  try {
    res.json({ message: "successfully" });
  } catch (error) {
    next(error);
  }
};

const show = (req, res, next) => {
  try {
    res.json({ message: "successfully" });
  } catch (error) {
    next(error);
  }
};
const save = async (req, res, next) => {
  try {
    const response = await SaveReviewService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const edit = (req, res, next) => {
  try {
    res.json({ message: "successfully" });
  } catch (error) {
    next(error);
  }
};
const destroy = (req, res, next) => {
  try {
    res.json({ message: "successfully" });
  } catch (error) {
    next(error);
  }
};

module.exports = {
  get,
  show,
  save,
  edit,
  destroy,
};
