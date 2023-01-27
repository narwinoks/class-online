const getCategory = require("../services/category/GetCategoryService");
const postCategory = require("../services/category/PostCategoryService");
const editCategory = require("../services/category/UpdateCategoryService");
const destroyCategory = require("../services/category/DeleteCategoryService");
const showCategory = require("../services/category/ShowCategoryService");

const get = async (req, res, next) => {
  try {
    const response = await getCategory();
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const save = async (req, res, next) => {
  try {
    const response = await postCategory(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const edit = async (req, res, next) => {
  try {
    const response = await editCategory(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const destroy = async (req, res, next) => {
  try {
    const response = await destroyCategory(req.params.id);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const show = async (req, res, next) => {
  try {
    const response = await showCategory(req.params.id);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
module.exports = {
  get,
  save,
  edit,
  destroy,
  show,
};
