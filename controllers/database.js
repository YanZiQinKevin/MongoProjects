var express = require('express');
var router = express.Router();

var mongodb = require('mongodb');
var mongoDBURI = process.env.MONGODB_URI ||
    'mongodb://yan:c123465s@ds255265.mlab.com:55265/heroku_lt22jv12';
var bodyParser = require('body-parser'); //to process data sent in on request need body-parser module


/** getAllRoutes controller logic that current does model logic too -connects to Mongo database and
 * queries the Routes collection to retrieve all the routes and build the output usig the
 * ejs template mongodb.ejs found in views directory
 * @param request
 * @param response
 *
 */
module.exports.getAllRoutes =  function (request, response) {

    mongodb.MongoClient.connect(mongoDBURI, function(err, db) {
        if(err) throw err;

        //get collection of routes
        var Routes = db.collection('ORDERS');


        //FIRST showing you one way of making request for ALL routes and cycle through with a forEach loop on returned Cursor
        //   this request and loop  is to display content in the  console log
        var c = Routes.find({});

        c.forEach(
            function(myDoc) {
                console.log("_id"+myDoc._id);
                console.log( "name: " + myDoc.name );  //just  loging the output to the console
                console.log("price:"+myDoc.price);
                console.log("CUSTOMER_ID:"+myDoc.CUSTOMER_ID);
                console.log("BILLING_ID:"+myDoc.SHIPPING_ID);
                console.log("DATE:"+myDoc.DATE);
                console.log("ORDER_TOTAL"+myDoc.ORDER_TOTAL);
            }
        );


        //SECOND -show another way to make request for ALL Routes  and simply collect the  documents as an
        //   array called docs that you  forward to the  getAllRoutes.ejs view for use there
        Routes.find().toArray(function (err, docs) {
            if(err) throw err;

            response.render('getAllRoutes', {results: docs});

        });


        //Showing in comments here some alternative read (find) requests
        //this gets Routes where frequency>=10 and sorts by name
        // Routes.find({ "frequency": { "$gte": 10 } }).sort({ name: 1 }).toArray(function (err, docs) {
        // this sorts all the Routes by name
        //  Routes.find().sort({ name: 1 }).toArray(fu namenction (err, docs) {


        //close connection when your app is terminating.
        db.close(function (err) {
            if(err) throw err;
        });
    });//end of connect
};//end function

module.exports.storeData = function (req, res) {

    //now processing post
    //expecting data variable called name --retrieve value using body-parser
    var body = JSON.stringify(req.body);  //if wanted entire body as JSON
    var params = JSON.stringify(req.params);//if wanted parameters

    // Retrieve the data associated with customer and bill addresss.
    var first = req.body.first_name;
    console.log("first",first);

    var last = req.body.last_name;
    var email=req.body.email;
    var phone=req.body.phone;
    var address = req.body.bi_address;
    var city = req.body.bi_city;
    var state = req.body.bi_state;
    var zip = req.body.bi_zip;
    // Retrieve the data associated with billing.
    var card = req.body.card;
    var card_num = req.body.card_num;
    var exp_date = req.body.date;
    // Retrieve the data associated with shipping.
    var ship_address = req.body.address;
    var ship_city = req.body.city;
    var ship_state = req.body.state;
    var ship_zip = req.body.zip;
    var provector=req.body.provector;
    var total = req.body.total;

    // Connect to the database.
    mongodb.MongoClient.connect(mongoDBURI, function(err, db) {
        if(err) throw err;

        // Create IDs for all the collections.
        var customerID = Math.floor((Math.random() * 100000000000) + 1);
        var billingID = Math.floor((Math.random() * 10000000000) + 1);
        var shippingID = Math.floor((Math.random() * 1000000000) + 1);
        var orderID = Math.floor((Math.random() * 100000000) + 1);
        // Get collection of customers, billing, shipping, orders.
        var customers = db.collection('CUSTOMERS');
        var billing = db.collection('BILLING');
        var shipping = db.collection('SHIPPING');
        var orders = db.collection('ORDERS');

        // Create a document to insert into CUSTOMERS.
        var customerData = {_id : customerID, FIRSTNAME : first, LASTNAME : last,
            STREET : address, CITY : city, STATE : state, ZIP : zip, EMAIL: email, PHONE:phone};

        // Create a document to insert into BILLING.
        var billingData = {_id : billingID, CUSTOMER_ID : customerID, CREDITCARDTYPE : card,
            CREDITCARDNUM : card_num, CREDITCARDEXP : exp_date};

        // Create a document to insert into SHIPPING.
        var shippingData = {_id : shippingID, CUSTOMER_ID : customerID, SHIPPING_STREET : ship_address,
            SHIPPING_CITY : ship_city, SHIPPING_STATE : ship_state, SHIPPING_ZIP : ship_zip};

        // Create a document to insert into ORDERS.
        var orderData = {_id: orderID,CUSTOMER_ID : customerID, BILLING_ID : billingID, SHIPPING_ID : shippingID,
            PRODUCT_VECTOR:provector,ORDER_TOTAL: total, DATE : new Date().toDateString()};

        // Insert document into SHIPPING
        // // Insert document into BILLING.
        // // Insert document into CUSTOMERS.
        // // Insert document into ORDERS.
        customers.insertOne(customerData, function (err, result){ if(err) throw err; });
        billing.insertOne(billingData, function (err, result){ if(err) throw err; });
        shipping.insertOne(shippingData, function (err, result){ if(err) throw err; });
        orders.insertOne(orderData, function (err, result){ if(err) throw err; });

        //get data


        //    response.render('storeData', {results: docs});

        res.render('storeData', {customer: customerData, order: orderData,
            billing: billingData, shipping: shippingData });
        // Close connection.

        // db.close(function  (err) {
        //     if(err) throw err;
        // });
        db.close(function (err){ if(err) throw err; });
    });
};
