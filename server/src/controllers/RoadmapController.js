const GetRoadMap = require("../services/Roadmap/GetRoadmapService");
const ShowRoadMap = require("../services/Roadmap/ShowRoadmapService");
const PostRoadMap = require("../services/Roadmap/PostRoadmapService");
const DeleteRoadmap = require("../services/Roadmap/DeleteRoadmapService");
const EditRoadmap = require("../services/Roadmap/EditRoadmapService");
const DetailRoadmap = require("../services/Roadmap/DetailRoadMapService");

const get = async (req, res, next) => {
  try {
    const response = await GetRoadMap(req);
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
    const response = await PostRoadMap(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const detail = async (req, res, next) => {
  try {
    const id = req.params.id;
    const response = await DetailRoadmap(id);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const edit = async (req, res, next) => {
  try {
    const response = await EditRoadmap(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const destroy = async (req, res, next) => {
  try {
    const response = await DeleteRoadmap(req.params.id);
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
  detail,
};
