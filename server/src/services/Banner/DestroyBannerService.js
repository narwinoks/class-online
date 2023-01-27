const { Banner } = require("../../models");
module.exports =async(id)=>{
    const banner = await Banner.findByPk(id);
    if(!banner) return {status:404 ,success:false ,message :"Data not found"}
    banner.destroy();  
    return { status: 200, success: true, message: "Successfully" };

}