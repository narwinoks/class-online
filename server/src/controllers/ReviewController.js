const SaveReviewService = require("../services/Reviews/SaveReviewService");
const UpdateReviewService = require("../services/Reviews/UpdateReviewService");
const DeleteReviewService = require("../services/Reviews/DeleteReviewService");
const save = async (req, res, next) => {
  try {
    const response = await SaveReviewService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const edit = async (req, res, next) => {
  try {
    const response = await UpdateReviewService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const destroy = async (req, res, next) => {
  try {
    const response = await DeleteReviewService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

module.exports = {
  save,
  edit,
  destroy,
};
