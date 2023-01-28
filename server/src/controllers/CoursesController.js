const GetCoursesService = require("../services/Courses/GetCoursesService");
const ShowRoadMap = require("../services/Roadmap/ShowRoadmapService");
const PostCoursesService = require("../services/Courses/PostCoursesService");
const DeleteCoursesService = require("../services/Courses/DeleteCoursesService");
const EditCoursesService = require("../services/Courses/EditCoursesService");

const get = async (req, res, next) => {
  try {
    const response = await GetCoursesService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const show = async (req, res, next) => {
  try {
    const response = await ShowRoadMap(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const save = async (req, res, next) => {
  try {
    const response = await PostCoursesService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const edit = async (req, res, next) => {
  try {
    const response = await EditCoursesService(req);
    console.log(response);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const destroy = async (req, res, next) => {
  try {
    const response = await DeleteCoursesService(req.params.id);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

module.exports = {
  get,
  save,
  show,
  edit,
  destroy,
};
