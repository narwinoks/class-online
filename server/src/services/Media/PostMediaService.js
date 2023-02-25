const isBase64 = require("is-base64");
const base64Img = require("base64-img");
const fs = require("fs");
const { Media } = require("../../models");
module.exports = (data) => {
  const image = data.body.image;
  //CHECK VALID BASE64 IMAGES
  if (!isBase64(image, { mimeRequired: true }))
    return { status: 200, success: false, message: "Invalid Base64 image" };
  //MOVE IMAGE TO PUBLIC DIRECTORY
  const moveMedia = base64Img.imgSync(image, "./public/images", Date.now());
  const fileName = moveMedia.split("/").pop();
  const mediaData = Media.create({
    media: `images/${fileName}`,
  });

  const response = {
    images: `http://${data.get("host")}/images/${fileName}`,
  };
  return {
    status: 200,
    success: true,
    message: "SuccessFully",
    data: response,
  };
};
