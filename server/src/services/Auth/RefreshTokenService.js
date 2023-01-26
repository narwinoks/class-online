const { User } = require("../../models");
const jwt = require("jsonwebtoken");
require("dotenv").config();
const { JWT_SECRET,JWT_SECRET_REFRESH_TOKEN,JTW_ACCESS_TOKEN_EXPIRED,JWT_REFRESH_TOKEN_EXPIRED } = process.env;

module.exports = async (data) => {
  const refreshToken =data.body.refresh_token;
try {

    const verify =await jwt.verify(refreshToken, JWT_SECRET_REFRESH_TOKEN);
    if (!verify) return { message: "Invalid Refresh Token" ,success:false,status: 404};
     // GENERATE ACCESS TOKEN
    const user =verify.data;
    const access_token =await jwt.sign({user} ,JWT_SECRET ,{
        expiresIn : JTW_ACCESS_TOKEN_EXPIRED
    });
    // GENERATE REFRESH TOKEN
    const refresh_token   = await jwt.sign({user},JWT_SECRET_REFRESH_TOKEN,{
        expiresIn:JWT_REFRESH_TOKEN_EXPIRED
    })
    const response ={
        access_token:access_token,
        refreshToken:refresh_token
    }
    return { message: "successfully" ,success:true,status:200 ,data:response};
} catch (error) {
    return { message: error.message ,success:false,status:error.status || 500};
}
};
