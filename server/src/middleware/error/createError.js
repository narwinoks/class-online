module.exports = (error,req,res,next) => {
  const errorStatus = error.status || 500;
  const errorMessage = error.message || "something wren wrong !";
  return res.status(errorStatus).json({
    success: false,
    message: errorMessage,
    status: errorStatus,
    stack: error.stack,
  });
};
