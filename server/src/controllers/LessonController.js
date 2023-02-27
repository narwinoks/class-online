const SaveLessonService = require("../services/Lessons/SaveLessonService");
const DeleteLessonService = require("../services/Lessons/DeleteLessonsService");
const GetLessonService = require("../services/Lessons/GetLessonsService");
const EditLessonService = require("../services/Lessons/EditLessonService");
const ShowLessonService = require("../services/Lessons/ShowLessonService");
const get = async (req, res, next) => {
  try {
    const response = await GetLessonService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const show = async (req, res, next) => {
  try {
    const response = await ShowLessonService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const save = async (req, res, next) => {
  try {
    const response = await SaveLessonService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const edit = async (req, res, next) => {
  try {
    const response = await EditLessonService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const destroy = async (req, res, next) => {
  try {
    const response = await DeleteLessonService(req.params.id);
    res.status(response.status).json(response);
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
