const getRoadMapService = require("../services/MyRoadMap/GetRoadMapService");
const saveRoadMapService = require("../services/MyRoadMap/SaveRoadMapService");

const get = async (req, res, next) => {
  try {
    const response = await getRoadMapService(req);
    res.status(response.status).json(response);
    res.json({ message: "req to parameters get" });
  } catch (error) {
    next(error);
  }
};

const save = async (req, res, next) => {
  try {
    const response = await saveRoadMapService(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

module.exports = {
  get,
  save,
};
