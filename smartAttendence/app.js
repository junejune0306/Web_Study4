var express = require("express");
const path = require("path");

var app = express();
app.use(express.urlencoded({ extended: true }));

app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "/"));

app.listen(3000, () => {
	console.log("listening on port 3000");
});

const num = Math.floor(Math.random() * 1000);
global.num = num;
console.log(num);

app.get("/", (req, res) => {
	res.render("main", { number: num });
});

app.post("/", (req, res) => {
	if (req.body.input == num) res.render("check");
	else res.render("retry");
});