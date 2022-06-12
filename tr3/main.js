var express = require("express");

var app = express();
app.use(express.urlencoded({ extended: true }));

app.listen(3000, () => {
	console.log("listening on port 3000");
});

app.get("/", (req, res) => {
	res.sendFile(__dirname + "/req.html");
});

app.post("/", (req, res) => {
	res.send("이름 : " + req.body.name + "<br>나이 : " + req.body.age);
});