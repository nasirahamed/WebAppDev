var http = require('http');
var path = require('path');
var express = require('express');
var fs = require('fs');

var bodyParser = require('body-parser');

var router = express();
var server = http.createServer(router);

router.use(express.static(path.resolve(__dirname, 'client')));
router.use(bodyParser.urlencoded({extended: true}));
router.use(bodyParser.json());

router.get('/', function(req, res){
  res.render('index');
});

router.get('/get/json', function(req, res){
  res.setHeader('Content-type', 'application/json');
  var obj = JSON.parse(fs.readFileSync('Countries.json','utf8'));
  res.end(JSON.stringify(obj));
});

router.post('/post/json', function(req, res){
  console.log(req.body);
})
server.listen(process.env.PORT || 3000, process.env.IP || "0.0.0.0", function(){
  var addr = server.address();
  console.log("server listening at", addr.address + ":" + addr.port);
});

// npm install fs --save - TO INSTALL AND SAVE FS