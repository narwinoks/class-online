require("dotenv").config();
const { MIDTRANS_SERVER_KEY, MIDTRANS_CLIENT_KEY } = process.env;
const sha512 = require("js-sha512");
const { Order, PaymentLog, MyCourses } = require("../../models");

module.exports = async (req) => {
  const data = req.body;
  //   return { status: 200, success: true, message: "successfully", test:JSON.stringify(test),data:JSON.stringify(req.body)  };
  const signatureKey = data.signature_key;
  const orderId = data.order_id;
  const statusCode = data.status_code;
  const grossAmount = data.gross_amount;
  const serverKey = MIDTRANS_SERVER_KEY;

  const mySignature = sha512(orderId + statusCode + grossAmount + serverKey);
  const transactionStatus = data.transaction_status;
  const type = data.payment_type;
  const fraudStatus = data.fraud_status;
  if (signatureKey !== mySignature) {
    return { status: 400, success: false, message: "Invalid Signature Key" };
  }
  const realOrderId = orderId.split("-")[0];
  const order = await Order.findByPk(realOrderId);
  if (!order) {
    return { status: 404, success: false, message: "Order not found" };
  }
  if (order.status === "success") {
    return { status: 419, success: true, message: "operation permitted" };
  }

  if (transactionStatus == "capture") {
    if (fraudStatus == "challenge") {
      // TODO set transaction status on your database to 'challenge'
      // and response with 200 OK
      order.status = "challenge";
    } else if (fraudStatus == "accept") {
      // TODO set transaction status on your database to 'success'
      // and response with 200 OK
      order.status = "success";
    }
  } else if (transactionStatus == "settlement") {
    // TODO set transaction status on your database to 'success'
    // and response with 200 OK
    order.status = "success";
  } else if (
    transactionStatus == "cancel" ||
    transactionStatus == "deny" ||
    transactionStatus == "expire"
  ) {
    // TODO set transaction status on your database to 'failure'
    // and response with 200 OK
    order.status = "failure";
  } else if (transactionStatus == "pending") {
    // TODO set transaction status on your database to 'pending' / waiting payment
    // and response with 200 OK
    order.status = "pending";
  }

  const rawResponse = JSON.stringify(data);
  const logData = {
    status: transactionStatus,
    raw_response: rawResponse,
    order_id: realOrderId[0],
    payment_type: type,
  };

  const paymentLog = await PaymentLog.create(logData);
  order.save();
  if (order.status == "success") {
    const myCourse = await MyCourses.create({
      user_id: order.user_id,
      course_id: order.course_id,
    });
    return {
      status: 200,
      success: true,
      message: "successfully",
      data: myCourse,
    };
  }
  return { status: 200, success: true, message: "successfully", realOrderId };
};
