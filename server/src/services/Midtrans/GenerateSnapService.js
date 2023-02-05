const midtransClient = require("midtrans-client");
require("dotenv").config();
const { MIDTRANS_SERVER_KEY, MIDTRANS_CLIENT_KEY } = process.env;
module.exports = async (params) => {
  // Create Snap API instance
  console.log(params);
  let snap = new midtransClient.Snap({
    isProduction: false,
    serverKey: MIDTRANS_SERVER_KEY,
    clientKey: MIDTRANS_CLIENT_KEY,
  });
  const url_snap = await snap.createTransaction(params);

  return url_snap.redirect_url;
};
