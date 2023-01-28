const validator = require("fastest-validator");
const v = new validator();

module.exports = async (req, res, next) => {
  const schema = {
    name: { type: "string" },
    certificate: { type: "boolean" },
    thumbnail: "url",
    type: { type: "enum", values: ["free", "premium"] },
    status: { type: "enum", values: ["draft", "published"] },
    // price: "number",
    level: { type: "enum", values: ["all-level", "beginner","intermediate","advanced"] },
    mentor_id : "number|empty:false",
    roadmap_id : "number|empty:false",
    description : "string"
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
