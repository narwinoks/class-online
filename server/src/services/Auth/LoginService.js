const { User,RefreshToken } = require("../../models");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
require("dotenv").config();
const { JWT_SECRET,JWT_SECRET_REFRESH_TOKEN,JTW_ACCESS_TOKEN_EXPIRED,JWT_REFRESH_TOKEN_EXPIRED } = process.env;

module.exports = async (data) => {
  const user = await User.findOne({where:{
    email : data.email
  }});
  if (!user) return { status: 404, success: false, message: "Email Email Not Found" }; 
  const comparePassword = await bcrypt.compare(data.password,user.password);
  if (!comparePassword) return { status: 404, success: false, message: "Invalid Password"};
  // Save Refresh token
  const objectUser ={
    id :user.id,
    admin:user.admin
  };
  // GENERATE ACCESS TOKEN
  const access_token =await jwt.sign({data:objectUser} ,JWT_SECRET ,{
    expiresIn : JTW_ACCESS_TOKEN_EXPIRED
  });
  // GENERATE REFRESH TOKEN
  const refresh_token   = await jwt.sign({data:objectUser},JWT_SECRET_REFRESH_TOKEN,{
    expiresIn:JWT_REFRESH_TOKEN_EXPIRED
  })
const refreshToken = await RefreshToken.create({ user_id : user.id ,token : refresh_token})
 const response ={
   id:user.id,
   access_token:access_token,
   refresh_token :refresh_token
 }
 return { success: true, status: 200, data: response }; 
};
