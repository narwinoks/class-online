const GetMentorService = require("../services/Mentors/GetMentorService");
const SaveMentorService = require("../services/Mentors/SaveMentorService");
const DestroyMentorService = require("../services/Mentors/DestroyMentorService");
const ShowMentorService = require("../services/Mentors/ShowMentorService");
const UpdateMentorService = require("../services/Mentors/UpdateMentorService");

const get = async (req, res, next) => {
  try {
    const response = await GetMentorService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const save = async (req, res, next) => {
  try {
    const response = await SaveMentorService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const destroy = async (req, res, next) => {
  try {
    const response = await DestroyMentorService(req.params.id);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const show = async (req, res, next) => {
  try {
    const response = await ShowMentorService(req.params.id);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const update = async (req, res, next) => {
  try {
    const response = await UpdateMentorService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
module.exports = {
  get,
  save,
  destroy,
  show,
  update,
};
