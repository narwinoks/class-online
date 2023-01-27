const { Category } = require("../../models");

module.exports =async (request) =>{
    const category =await Category.findByPk(request.params.id);
    category.update({
        name: request.body.name,
        logo : request.body.logo
    });
    return {status :200 ,success:true ,message:"successfully" ,data:category}
}