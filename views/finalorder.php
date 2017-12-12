<!DOCTYPE html>
 <?php session_start(); 


 ?>
<html lang="en"><!-- InstanceBegin template="/Templates/temp.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style type="text/css">
<!--
.STYLE1 {font-size: xx-large;
        
		 }
-->
    </style>
    <!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>
  <body style="overflow:-scroll; overflow-x:hidden">

    <div class="STYLE1 container" id="header" style="background-color:#FFFFFF">
	<table width="1270" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <th scope="col"><div align="center"><a href="index.html"><img src="logo.png" width="48" height="46" border="0"></a></div></th>
    <th colspan="4" scope="col"> <div align="center">GAP</div></th></tr>
  <tr>
    <td width="283">WOMAN</td>
    <td width="200">MAN</td>
    <td width="264">BABY</td>
    <td width="253">TODDLER </td>
    <td width="190"> FACTORY </td>
  </tr>
</table>
	</div>
  <div class="row">
	  <!-- InstanceBeginEditable name="EditRegion1" -->
	</div>
	
	

	  <?php 
 if (isset($_POST["name_card"])){
  $_SESSION['bi_address1']=$_POST['bi_address1'];
  $_SESSION['bi_address2']=$_POST['bi_address2'];
  $_SESSION['bi_city']=$_POST['bi_city'];
  $_SESSION['bi_state']=$_POST['bi_state'];
  $_SESSION['bi_zip']=$_POST['bi_zip'];
  $_SESSION['name_card']=$_POST['name_card'];
  $_SESSION['card_number']=$_POST['card_number'];
  $_SESSION['date']=$_POST['date'];
  $_SESSION['cvs']=$_POST['cvs'];
  }
		   ?>
	 <div class ="container">
	  <div class ="row">
	    <div class ="col">
		 <h1 style="text-align:center">Summary 
		 </h1>
		
		 </div>
		 </div>
		 <div class ="row">
		  <div class="col-sm-6">
	  <table class="table" ><tr><thead> <th>Item#</th><th>Product ID</th><th>Product Name</th><th>Size</th> <th> Quantity </th> <th>Price/item</th> <th>Cost</th></thead></tr>
	  <?php 
	   include("check.php");
	  $session_basket=unserialize($_SESSION['basket']);
reset($session_basket);
$i=0;
$t=0;
while(list($k, $v) = each($session_basket)) {
$i++;

$item = $session_basket[$k];
$image = "" . $item->code . ".png";
$t=$t+($item->price*$item->quantity);
?>
<tr>
<td><?php echo $i .")" ; ?>,<img src="product/<?php echo $item->code; ?>a.png" width="50" height="60"></td>
<td><?php echo $item->code; ?> </td>
<td><?php echo $item->name; ?> </td>
<td><?php echo $item->size; ?> </td>
<td><?php echo $item->quantity; ?> </td>
<td><?php echo $item->price; ?> </td>
<td><?php echo ($item->price*$item->quantity); ?> </td>
</tr>

<?php
} //end of loop

?>
</table>
<h1 style="color:#FF0000"> Total: <?php echo $t; ?> </h1>
</div> <!-- sm-6 -->
 <div class="col-sm-6">
   <table class="table" width="1000" border="1" cellspacing="5" cellpadding="5">
  <h1 style="text-align:center">Information</h1>
  <tr>
    <th scope="row">Last Name:</th>
    <td><?php echo $_SESSION['last_name']?></td>
  </tr>
  <tr>
    <th scope="row">First Name:</th>
    <td><?php echo $_SESSION['first_name']?></td>
  </tr>
  <tr>
    <th scope="row">Email:</th>
    <td><?php echo $_SESSION['email']?></td>
  </tr>
  <tr>
    <th scope="row">Phone number:</th>
    <td><?php echo $_SESSION['phone']?></td>
  </tr>
  <tr>
    <th scope="row">shopping Address:</th> 
    <td style="word-wrap:break-word;word-break:break-all">Address:<?php echo $_SESSION['address1']?>,<?php echo $_SESSION['address2']?> Ctiy:<?php echo $_SESSION['city']?>
	State:<?php echo $_SESSION['state']?> Zip:<?php echo $_SESSION['zip']?>
	</td>
  </tr>
  <tr>
    <th scope="row"> Name on Card：</th>
    <td><?php echo $_SESSION['name_card']?></td>
  </tr>
   <tr>  
    <th scope="row">card number:</th>
    <td><?php echo $_SESSION['card_number']?></td>
  </tr>
   <tr> 
    <th scope="row">Billing Address:</th>
    <td style="word-wrap:break-word;word-break:break-all">Address:<?php echo $_SESSION['bi_address1']?>,<?php echo $_SESSION['bi_address2']?> Ctiy:<?php echo $_SESSION['bi_city']?> State:<?php echo $_SESSION['bi_state']?> Zip:<?php echo $_SESSION['bi_zip']?>
	</td>
  </tr>
</table>
<?php
//Http _request2 module
 require_once 'HTTP/Request2.php';
$request = new HTTP_Request2('https://mongo-yan.herokuapp.com/storeData');
//$request = new HTTP_Request2('localhost:3000/storeData');

$request->setMethod(HTTP_Request2::METHOD_POST) 
    ->addPostParameter('last_name',  $_SESSION['last_name'])
	->addPostParameter('first_name', $_SESSION['first_name'])
    ->addPostParameter('email',  $_SESSION['email'])
	 ->addPostParameter('phone',  $_SESSION['phone'])
     ->addPostParameter('card',  $_SESSION['name_card'])
	 ->addPostParameter('address',  $_SESSION['address1'])
	 ->addPostParameter('card_num',  $_SESSION['card_number'])
	 ->addPostParameter('bi_address',  $_SESSION['bi_address1'])
	 ->addPostParameter('city',  $_SESSION['city'])
	 ->addPostParameter('state',  $_SESSION['state'])
	 ->addPostParameter('zip',  $_SESSION['zip'])
	 ->addPostParameter('bi_city',  $_SESSION['bi_city'])
	 ->addPostParameter('bi_state',  $_SESSION['bi_state'])
	 ->addPostParameter('bi_zip',  $_SESSION['bi_zip'])
	 ->addPostParameter('date',  $_SESSION['date']);
// ######### To Fix the SSL issue ###########
$request->setConfig(array(
    'ssl_verify_peer'   => FALSE,
    'ssl_verify_host'   => FALSE
));
	$session_basket=unserialize($_SESSION['basket']);
	reset($session_basket);
	$i=0;
	$t=0;
	$cart;
	while(list($k, $v) = each($session_basket)) {
	$i++;
	$item = $session_basket[$k];
	$t=$t+($item->price*$item->quantity);
	   $code=$item->code;
	   $name= $item->name;
	   $size = $item->size;
	   $quantity = $item->quantity;
	   $price = $item->price;
	   $cost = ($item->price*$item->quantity);
	$cart=$cart.$name.','.$size.','.$quantity.','.$price.'|';
	}
 $request->addPostParameter('provector', $cart);
 $request->addPostParameter('total', $t);
 ########################################
//invoke request and get the response
try {
    $response = $request->send(); //SENDING request
    if (200 == $response->getStatus()) {//GETTING RESPONSE
        echo $response->getBody();
    } else {
        echo ' Your Order is NOT successful';
    }
} catch (HTTP_Request2_Exception $e) {
    echo ' Your Order is NOT successful <br>';
    echo 'Error: ' . $e->getMessage();
	 
}

?>
 </div>
	  </div><!-- row -->
	  </div><!-- container -->
   <div> <!-- InstanceEndEditable --></div>
	<div id="footer" class="container"><img src="gap.png" width="1250"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
<!-- InstanceEnd --></html>