<!DOCTYPE html>
<?php session_start();  ?>
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
   <div class="col-sm-1"></div>
	  <div class="col-sm-6">
	  <form action="payment.php"  method="post">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationServer01">First name</label>
      <input type="text" class="form-control is-valid" name="first_name" id="validationServer01" placeholder="First name" value="" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServer02">Last name</label>
      <input type="text" class="form-control is-valid" name="last_name" id="validationServer02" placeholder="Last name" value="" required>
    </div>
  </div>
  <div class="row">
      <div class="col-md-6 mb-3">
      <label for="validationServer07">House number and Street</label>
      <input type="text" class="form-control is-valid" name="address1" id="validationServer07" placeholder="" value="" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServer08">Address line 2</label>
      <input type="text" class="form-control " name="address2" id="validationServer08" placeholder="" value="" >
    </div>
  </div> 
 
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationServer03">City</label>
      <input type="text" class="form-control is-invalid"  name="city" id="validationServer03" placeholder="City" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer04">State</label>
      <input type="text" class="form-control is-invalid" name="state" id="validationServer04" placeholder="State" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer05">Zip</label>
      <input type="text" class="form-control is-invalid"  name="zip" id="validationServer05" placeholder="Zip" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>
   <div class="row">
     <div class="col-md-6 md-3">
    <label for="validationServer06">Email address</label>
    <input type="email" class="form-control is-invalid"   name="email" id="validationServer06" aria-describedby="emailHelp" placeholder="Enter email" reuired>
	 <div class="invalid-feedback">
        Please provide a valid Email.
	</div>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
    <div class="col-md-6 md-3"> 
	 <label for="validationServer07">Phone number</label>
      <input type="text" class="form-control is-invalid"  name="phone" id="validationServer07" placeholder="Phone number" required>
      <div class="invalid-feedback">
        Please provide a valid Phone number.
	</div>
   </div>
   <div class="form-check">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="billing" value="option" checked>
    Use this address for my Billing
  </label>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
  </div>
  <br>
	<?php
		
	   $_SESSION['first_name']=$_POST['first_name'];
	   $_SESSION['last_name']=$_POST['last_name'];
	?>		  
    <!-- InstanceEndEditable --></div>
	<div id="footer" class="container"><img src="gap.png" width="1250"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
<!-- InstanceEnd --></html>