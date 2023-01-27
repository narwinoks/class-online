const { Category } = require("../../models");
module.exports =async () => {
  const response =await Category.findAll();
  if (!response.length ) return {status :404,success:true ,message:"empty data"};
  return {status :200,success:true ,message:"successfully" ,data:response };
};
