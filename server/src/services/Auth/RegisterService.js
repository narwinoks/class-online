const validEmail = require("../../middleware/validations/Auth/ValidEmail");
const { User } = require("../../models");
const jwt = require("jsonwebtoken");
const bcrypt = require("bcrypt");
require("dotenv").config();
const { JWT_SECRET,JWT_SECRET_REFRESH_TOKEN,JTW_ACCESS_TOKEN_EXPIRED,JWT_REFRESH_TOKEN_EXPIRED } = process.env;

module.exports = async (data) => {
  try {
    // CHECK VALID EMAIL
    const checkValidEmail = await validEmail.validEmail(data.email);
    if (checkValidEmail == "UNDELIVERABLE") {
      return { status: 404, success: false, message: "Invalid Email Address" };
    }
    // DUPLICATE EMAIL
    const duplicateEmail = await User.findOne({ where: { email: data.email } });
    if (duplicateEmail)
      return { status: 409, success: false, message: "Email Already Exists" };
    // HASH PASSWORD
    const hashPassword = await bcrypt.hash(data.password,10);
    // INSERT DATA TO DATABASE
    const user = await User.create({
      email: data.email,
      password: hashPassword
    });
    const objectUser ={
       id :user.id,
       admin:user.admin
    };
    // GENERATE ACCESS TOKEN
    const access_token =await jwt.sign({objectUser} ,JWT_SECRET ,{
      expiresIn : JTW_ACCESS_TOKEN_EXPIRED
    });
    // GENERATE REFRESH TOKEN
    const refresh_token   = await jwt.sign({objectUser},JWT_SECRET_REFRESH_TOKEN,{
      expiresIn:JWT_REFRESH_TOKEN_EXPIRED
    })
    const response ={
      id:user.id,
      access_token:access_token,
      refresh_token :refresh_token
    }
    return { success: true, status: 200, data: response };
  } catch (error) {
    return { success: false, error: error };
  }
};
