const express = require("express");
const logger = require("morgan");
const helmet = require("helmet");

const path = require("path");

const app = express();

app.use(helmet());
app.use(logger("short"));

app.set("view engine", "ejs");
app.set(express.static(path.join(__dirname, "public")));

app.get("/", (req, res) => res.render("index"));

app.listen(3000);
