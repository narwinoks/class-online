const PostServiceMedia = require("../services/Media/PostMediaService");

const store = async (req, res, next) => {
  try {
    const response = await PostServiceMedia(req);
    res.status(response.status).json(response);
  } catch (error) {
    next(error);
  }
};

module.exports = {
  store,
};
