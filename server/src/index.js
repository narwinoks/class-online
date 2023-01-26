const express = require("express");
const cors = require("cors");
const bodyParser = require("body-parser");
const dotenv = require("dotenv");
const path = require("path");
const Auth = require("./router/Auth");
const User = require("./router/User");
const Media = require("./router/Media");
const app = express();
const logger = require("morgan");
const corsOptions = {
  origin: "http://example.com",
  optionsSuccessStatus: 200, // some legacy browsers (IE11, various SmartTVs) choke on 204
};
dotenv.config();
const { PORT } = process.env;

// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }));
// parse application/json
app.use(bodyParser.json());
app.use(cors(corsOptions));

app.use(logger("dev"));
app.use(
  express.json({
    limit: "50mb",
  })
);
app.use(
  express.urlencoded({
    extended: false,
    limit: "50mb",
  })
);
app.use(express.static(path.join(__dirname, "../public")));

app.get("/", function (req, res) {
  res.json({ message: "successfully" });
});

app.use("/api/v1/auth", Auth);
app.use("/api/v1/user/profile", User);
app.use("/api/v1/media", Media);

// middleware error handler
app.use((error, req, res, next) => {
  const errorStatus = error.status || 500;
  const errorMessage = error.message || "something wren wrong !";
  return res.status(errorStatus).json({
    success: false,
    message: errorMessage,
    status: errorStatus,
    stack: error.stack,
  });
});

app.listen(PORT, () => {
  console.log(`APP listening AT ${PORT}`);
});
