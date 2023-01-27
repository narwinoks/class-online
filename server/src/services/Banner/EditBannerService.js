const { Banner } = require("../../models");
module.exports = async (data) => {
  const id = data.params.id;
  const banner = await Banner.findByPk(id);
  if(!banner) return {status:404 ,success:false ,message :"Data not found"}
  banner.update(data.body);  
  return { status: 200, success: true, message: "Successfully", data :banner };
};
