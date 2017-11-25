var express = require('express');
var router = express.Router();


var controllerMongoCollection = require('../controllers/database');
var bodyParser = require('body-parser');
var path = require ('path'); //to work with separtors on any OS including Windows
var querystring = require('querystring'); //for use in GET Query string of form URI/path?name=value
/* GET home page. */



router.use(bodyParser.json()); // for parsing application/json
router.use(bodyParser.urlencoded({ extended: true })); // for parsing application/x-www-form-urlencode

var mongodb = require('mongodb');
var url = 'mongodb://yan:c123465s@ds255265.mlab.com:55265/heroku_lt22jv12';

/* GET home page. */
// router.get('/', function(req, res, next) {
//   res.render('index', { title: 'Express' });
// });
router.get('/getAllRoutes', controllerMongoCollection.getAllRoutes);
router.post('/storeData',controllerMongoCollection.storeData);


module.exports = router;
