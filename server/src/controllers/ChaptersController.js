const GetChapterService = require("../services/Chapters/GetChapterService");
const SaveChapterService = require("../services/Chapters/PostChapterService");
const ShowChapterService = require("../services/Chapters/ShowChapterService");
const DeleteChapterService = require("../services/Chapters/DeleteChapterService");
const UpdateChapterService = require("../services/Chapters/UpdateChapterService");

const get = async (req, res, next) => {
  try {
    const response = await GetChapterService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const edit = async (req, res, next) => {
  try {
    const response = await UpdateChapterService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const save = async (req, res, next) => {
  try {
    const response = await SaveChapterService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const destroy = async (req, res, next) => {
  try {
    const response = await DeleteChapterService(req.params.id);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const show = async (req, res, next) => {
  try {
    const response = await ShowChapterService(req.params.id);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

module.exports = {
  get,
  edit,
  save,
  destroy,
  show,
};
