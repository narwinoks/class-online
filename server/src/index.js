const express = require("express");
const cors = require("cors");
const bodyParser = require("body-parser");
const dotenv = require("dotenv");
const path = require("path");
const Auth = require("./router/Auth");
const User = require("./router/User");
const Media = require("./router/Media");
const Banner = require("./router/Banner");
const Category = require("./router/Category");
const Roadmap = require("./router/Roadmap");
const Courses = require("./router/Courses");
const Index = require("./router/Index");
const Chapters = require("./router/Chapters");
const Lessons = require("./router/Lesson");
const Mentors = require("./router/Mentors");
const Reviews = require("./router/Review");
const MyCourse = require("./router/MyCourse");
const Order = require("./router/Order");
const WebHook = require("./router/WebHook");
const MyRoadmap = require("./router/MyRoamap");
const verifyToken = require("./router/ValidToken");
const app = express();
const logger = require("morgan");
const corsOptions = {
  origin: "http://courses.tes/",
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

// app.get("/", function (req, res) {
//   res.json({ message: "successfully" });
// });

app.get("/", Index);
app.use("/api/v1/valid-token", verifyToken);

app.use("/api/v1/auth", Auth);
app.use("/api/v1/user/profile", User);
app.use("/api/v1/media", Media);
app.use("/api/v1/banner", Banner);
app.use("/api/v1/categories", Category);
app.use("/api/v1/roadmap", Roadmap);
app.use("/api/v1/courses", Courses);
app.use("/api/v1/chapters", Chapters);
app.use("/api/v1/lessons", Lessons);
app.use("/api/v1/mentors", Mentors);
app.use("/api/v1/reviews", Reviews);
app.use("/api/v1/my-courses", MyCourse);
app.use("/api/v1/order", Order);
app.use("/api/v1/webhook", WebHook);
app.use("/api/v1/my-roadmap", MyRoadmap);

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
