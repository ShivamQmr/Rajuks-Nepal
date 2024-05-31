const express = require("express");
const data = require("./database");

const http = require('http');

http.createServer(function(req, res){
    res.writeHead(200, {'content-type': 'text/html'});
    res.write('Hello world!')
    res.end();
}).listen(8080);