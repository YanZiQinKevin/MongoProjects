<!DOCTYPE html>
<?php session_start(); ?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Payment</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
<div class="STYLE1 container" id="header" >
	<table width="1270" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <th scope="col"><div align="left"><a href="index.html"><img src="logo.png" width="48" height="46" border="0"></a></div></th>
    </tr>
</table>
</div>
<?php
 //set session
 session_start();
  $_SESSION['first_name']=$_POST['first_name'];
  $_SESSION['last_name']=$_POST['last_name'];
  $_SESSION['address1']=$_POST['address1'];
  $_SESSION['address2']=$_POST['address2'];
  $_SESSION['city']=$_POST['city'];
  $_SESSION['state']=$_POST['state'];
  $_SESSION['zip']=$_POST['zip'];
  $_SESSION['email']=$_POST['email'];
  $_SESSION['phone']=$_POST['phone'];
  $_SESSION['billing']=$_POST['billing'];
  if($_POST[billing]=="option"){
  $_SESSION['bi_address1']=$_POST['address1'];
  $_SESSION['bi_address2']=$_POST['address2'];
  $_SESSION['bi_city']=$_POST['city'];
  $_SESSION['bi_state']=$_POST['state'];
  $_SESSION['bi_zip']=$_POST['zip'];
  $address1=$_POST['address1'];
  $address2=$_POST['address2'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $zip=$_POST['zip'];
  }
?>
  <div class='container'>
  <div class='info'>
    <h1>Payment Card</h1>
    <span></span>
  </div>
  <form class='modal' action="finalorder.php" method="post">
    <header class='header'>
      <h1>Payment of $ <?php echo  $_SESSION['cost'] ?></h1>
      <div class='card-type'>
        <a class='card active' href='#'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/Amex.png'>
        </a>
        <a class='card' href='#'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/Discover.png'>
        </a>
        <a class='card' href='#'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/Visa.png'>
        </a>
        <a class='card' href='#'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/MC.png'>
        </a>
      </div>
    </header>
    <div class='content'>
      <div class='form'>
        <div class='form-row'>
          <div class='input-group'>
            <label for=''>Name on card</label>
            <input placeholder='' type='text' name="name_card">
          </div>
        </div>
        <div class='form-row'>
          <div class='input-group'>
            <label for=''>Card Number</label>
            <input maxlength='16' placeholder='' type='number' name="card_number">
          </div>
        </div>
        <div class='form-row'>
          <div class='input-group'>
            <label for=''>Expiry Date</label>
            <input placeholder='' type='month' name="date">
          </div>
          <div class='input-group'>
            <label for=''>CVS</label>
            <input maxlenght='4' placeholder='' type='number' name="cvs">
          </div>
        </div><!-- row-->
		<label for="" class="col-form-label">Billing Address:</label>
  <div class="form-group">
    <label for="inputAddress" class="col-form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" value="<?php echo $address1?>" name="bi_address1">
  </div>
  <div class="form-group">
    <label for="inputAddress2" class="col-form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" value="<?php echo $address2 ?>" name="bi_address2">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity" class="col-form-label">City</label>
      <input type="text" class="form-control" id="inputCity" name="bi_city" value="<?php echo $city?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState" class="col-form-label">State</label>
      <input id="inputState" type="text" class="form-control" value="<?php echo $state?>" name="bi_state" >
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip" class="col-form-label">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="bi_zip" value="<?php echo $zip?>">
    </div>
  </div>
      </div>
    </div>
    <footer class='footer'>
      <button class='button'>Complete Payment</button>
    </footer>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
