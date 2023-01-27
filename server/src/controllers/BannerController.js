const getBanner = require("../services/Banner/GetBannerService");
const postBanner = require("../services/Banner/SaveBannerService");
const editBanner = require("../services/Banner/EditBannerService");
const destroyBanner = require("../services/Banner/DestroyBannerService");

const get = async (req, res, next) => {
  try {
    const response = await getBanner(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const save = async (req, res, next) => {
  try {
    const response = await postBanner(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};
const show = (req, res, next) => {
  try {
    res.json({ message: "show banner" });
  } catch (error) {
    next(error);
  }
};
const edit = async (req, res, next) => {
  try {
    const response = await editBanner(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

const destroy = async (req, res, next) => {
  try {
    const response = await destroyBanner(req.params.id);
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
