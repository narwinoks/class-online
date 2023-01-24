import express from "express";
const app = express();

app.get("/", function (req, res) {
  res.json({ message: "successfully" });
});

app.listen(3000, () => {
  console.log("app running at port 3000");
});
