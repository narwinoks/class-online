const { Courses } = require("../../models");
const slug = require("slug");
const crypto = require("crypto");

module.exports = async (req) => {
  const data = req.body;
  data["slug"] = slug(
    data["name"] + "-" + crypto.randomBytes(5).toString("hex")
  );
  // data["slug"] = slug(data["name"], "-");
  const courses = await Courses.create(data);
  return { status: 200, success: true, message: "successfully", data: data };
};
