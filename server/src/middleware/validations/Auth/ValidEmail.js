const axios = require("axios");
require("dotenv").config();
const { EMAIL_KEY } = process.env;

const validEmail = async (email) => {
  const checkEmail = await axios.get(
    "https://emailvalidation.abstractapi.com/v1",
    {
      params: {
        api_key: EMAIL_KEY,
        email: email,
      },
    }
  );
  return checkEmail.data.deliverability;
};

module.exports = {
  validEmail,
};
