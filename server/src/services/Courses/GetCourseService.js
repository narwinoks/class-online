const { Courses, Sequelize, Order, Category } = require("../../models");
const Op = Sequelize.Op;
const moment = require("moment");
module.exports = async (req) => {
  const name = req.query.name;
  const status = req.query.status;
  const filter = req.query.filter;
  const category_params = req.query.category;
  const paramQuerySQL = {};

  //ADD RELATION TO TABLE CATEGORIES
  paramQuerySQL.include = {
    model: Category,
    attributes: ["name"],
    // where: { name: category_params },
  };
  // filtering by name
  if (name !== "" && typeof name !== "undefined") {
    const query = name;
    paramQuerySQL.where = {
      name: { [Op.like]: `%${query}%` },
    };
  }

  // FILTER BY STATUS
  if (status !== "" && typeof status !== "undefined") {
    const query = status;
    if (query == "draft" || query === "published") {
      paramQuerySQL.where = {
        status: query,
      };
    }
  }
  // FILTER POPULAR
  if (filter !== "" && typeof filter !== "undefined") {
    if (filter == "popular") {
      const courses = await Order.findAll(
        {
          attributes: ["course_id"],
        },
        {
          where: {
            createdAt: {
              [Op.between]: [
                moment().subtract(7, "d").format("YYYY-MM-DD"),
                moment().endOf("day").format(),
              ],
            },
          },
        }
      );
      const course_id = [];
      courses.forEach((element) => {
        course_id.push(element.course_id);
      });
      paramQuerySQL.where = {
        id: {
          [Sequelize.Op.in]: course_id,
        },
      };
    }
  }

  //FILTER BY CATEGORY
  if (category_params !== "" && typeof category_params !== "undefined") {
    const query = name;
    paramQuerySQL.include = {
      model: Category,
      attributes: ["name"],
      where: { name: category_params },
    };
  }

  const courses = await Courses.findAll(paramQuerySQL);
  if (!courses.length)
    return {
      status: 404,
      success: true,
      message: "empty data",
    };
  return {
    status: 200,
    success: true,
    message: "successfully",
    data: courses,
  };
};
