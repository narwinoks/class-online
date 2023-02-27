const getDashboardService = require("../services/Dashboard/getDashboardService");
const get = async (req, res) => {
  const DashboardService = await getDashboardService(req);
  res.status(DashboardService.status).json(DashboardService);
};

module.exports = {
  get,
};
