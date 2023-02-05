const { Order } = require("../../models");
const GenerateUrlSnap = require("../Midtrans/GenerateSnapService");

module.exports = async (data) => {
  const order = await Order.create({
    user_id: data.user.id,
    course_id: data.course.id,
  });
  // TRANSACTION DETAILS
  const transaction_details = {
    order_id: order.id,
    gross_amount: data.course.price,
  };
  // ITEM DETAILS
  const itemDetails = {
    id: data.course.id,
    price: data.course.price,
    quantity: 1,
    name: data.course.name,
    brand: "project",
    category: "Course Online",
  };
  // USER DETAILS
  const userDetail = {
    first_name: data.user.name,
    email: data.user.email,
  };
  // MIDTRANS PARAMS
  const midtransParmas = {
    transaction_details,
    itemDetails,
    userDetail,
  };

  // UPDATE DATA ORDER
  const urlSnap = await GenerateUrlSnap(midtransParmas);
  order.snap_url = urlSnap;
  order.meta_data = {
    courser_id: data.course.id,
    course_price: data.course.price,
    course_name: data.course.name,
    course_thumbnail: data.course.thumbnail,
    course_level: data.course.level,
  };
  order.save();

  // RETURN SNAP URL
  const snap_url = urlSnap;
  return snap_url;
};
