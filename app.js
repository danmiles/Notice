const express = require('express');

const app = express();

app.get("/", (request, response) => {
    response.json("Hey! This server was created by Denis Rusanov.!");
});

app.get('/time', (req, res) => {
    res.send(Date())
})


module.exports = app;