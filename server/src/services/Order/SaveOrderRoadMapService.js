const { Order } = require("../../models");
const GenerateUrlSnap = require("../Midtrans/GenerateSnapService");
module.exports = async (data) => {
  const order = await Order.create({
    user_id: data.user.id,
    roadmap_id: data.roadMap.id,
  });
  // TRANSACTION DETAILS
  const transaction_details = {
    order_id: order.id + "-" + Math.random(5),
    gross_amount: data.roadMap.price,
  };
  // ITEM DETAILS
  const itemDetails = {
    id: data.roadMap.id,
    price: data.roadMap.price,
    quantity: 1,
    name: data.roadMap.name,
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
    roadmap_id: data.roadMap.id,
    roadmap_price: data.roadMap.price,
    roadmap_name: data.roadMap.name,
    roadmap_thumbnail: data.roadMap.logo,
    roadmap_level: data.roadMap.level,
  };
  order.save();

  // RETURN SNAP URL
  const snap_url = urlSnap;
  return { snap_url };
};
