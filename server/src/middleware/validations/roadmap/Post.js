const validator = require("fastest-validator");
const v = new validator();

module.exports = async (req, res, next) => {
  const schema = {
    level: "string|empty:false",
    name: "string|empty:false|max:50",
  };
  //   add validation
  const validate = await v.validate(req.body, schema);
  // return validation errors
  if (validate.length) {
    res.status(400).json({
      success: false,
      message: "Validator Error",
      error: validate,
    });
  }
  next();
};
