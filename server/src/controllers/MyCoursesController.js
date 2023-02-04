const GetMyCourse = require("../services/MyCourse/GetMyCourseService");
const SaveMyCourse = require("../services/MyCourse/SaveMyCourseService");
const classPremiumService = require("../services/MyCourse/ClassPremiumService");

const get = async (req, res, next) => {
  try {
    const response = await GetMyCourse(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const save = async (req, res, next) => {
  try {
    const response = await SaveMyCourse(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const classPremium = async (req, res, next) => {
  try {
    const response = await classPremiumService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
module.exports = {
  get,
  save,
  classPremium,
};
