const validEmail = require("../../middleware/validations/Auth/ValidEmail");
const registerValidator = require("../../middleware/validations/Auth/Register");
module.exports = async (data, next) => {
  try {
    const validation = registerValidator(data);
    // CHECK VALID EMAIL
    const checkValidEmail = await validEmail.validEmail(data.email);
    if (checkValidEmail == "") {
    }
    if (true) {
      data = {
        success: true,
        response: 200,
        message: "not found",
      };
    }
    return { success: true, status: 200, data: data };
  } catch (error) {
    return { success: false, error: error };
  }
};
