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
	  <?php
           
		
			
        $verbose = true; //set to false to get rid of additional print outs
        // Class item = represents a product that is a item is in shopping basket
        class item {
                var $code; // code
                var $name; // name
                var $quantity; // quantity
                var $price; // price per item
				var $size;
                function item($code, $name, $quantity, $price, $size) {
                        $this->code = $code;
                        $this->name = $name;
                        $this->quantity = $quantity;
                        $this->price = $price;
						$this ->size=$size;
                }
        }

          class basket {

                /**
                * constructor
                */
                function basket() {
                        $this->sessionStart();
                }

                /**
                * start session OR if one already created retrieve shopping_basket
                */
                function sessionStart() {
                        global $session_basket;      //global variable ---array of items in basket

                        //start session or retrieve if already exists with client
                        session_start();

                        if($verbose) //verbose printout --not necessary
                                echo "session id ". session_id() . "<br>";

                        //if previouisly started grab data associated with session_basket
                        if(isset($_SESSION['session_basket']))
                        {
                                $session_basket = $_SESSION['session_basket'];
                                if($verbose) //verbose printout --not necessary
                                        {      echo "retrieved session basket is: ";
                                                print_r($session_basket);
                                                echo"<br>"; }
                        }
                        else
                        {      //if no session_basket initially to empty array
                                $session_basket = Array();

                                //store in SESSION variables
                                $_SESSION['session_basket'] = $session_basket;

                                if($verbose) //verbose printout --not necessary
                                        echo "session basket NEW";
                        }
                }
				
				 function sessionEnd() {
                        session_unset();
                        session_destroy();
						$this->basket();
                }
				

	
             function basketSize() {
                        global $session_basket;

                        // make session if not found
                        if ($session_basket == "") {
                                $this->sessionStart();
                        }

                        if (! is_array($session_basket)) {
                                return 0;
                        }
                        return $i;
                }
				 function registerItem($code, $name, $quantity, $price, $size) {
                        global $session_basket;

                        // make session if not found
                        if ($session_basket == "") {
                                $this->sessionStart();
                        }

                        // test to see if this product (with id $code) is currently IN basket, if so EDIT IT (update)
                        if (! $this->editItem($code, $name, $quantity, $price, $size)) {
                                $item = new item($code, $name, $quantity, $price, $size); //if NOT in basket CREATE IT
                                $session_basket[] = $item;
                        }

 

                        //Make sure to add updated $session_basket array to the SESSION variables

                        $_SESSION['session_basket'] = $session_basket;
                }
				 function editItem($code, $name, $quantity, $price, $size) {
                        global $session_basket;

                        // make session if not found
                        if ($session_basket == "") {
                                $this->sessionStart();
                                return false;
                        }

                        reset($session_basket);
                        while(list($k, $v) = each($session_basket)) { //search in $session_basket
                                if ($session_basket[$k]->code == $code) { //if found matching code (product id)
                                        // Found same code --- upade with new values the item
                                        $session_basket[$k]->name == $name;
                                        $session_basket[$k]->quantity = $quantity;
                                        $session_basket[$k]->price = $price;
                						$session_basket[$k]->size = $size;
                                       if($verbose) //verbose printout --not necessary
                                                echo "INSIDE editItem: " . $code . "<br>";

                                        return true; //return true we updated it
                                }
                        }

                        return false; //could not find the product currently in basket
                }
				   function deleteItem($code) {
                        global $session_basket;

                        // make session if not found         
                        if ($session_basket == "") {
                                $this->sessionStart();
                        }

                        reset($session_basket);
                        while(list($k, $v) = each($session_basket)) { //look through each item in basket
                                if ($session_basket[$k]->code == $code) { //if this item's code matches $code then we found the one to remove
                                        unset($session_basket[$k]); // remove this item from the $session_basket array
                                         $_SESSION['session_basket'] = $session_basket;
										return true;
                                }
                        }
                }
}

$basket = new basket();
if($_POST['Desired_Action'] == "Adding") //add and update case
 {

    //read in form data

    $code = $_POST['code'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $size= $_POST['size'];
	 
    //add it to the basket
    $basket->registerItem($code, $name, $quantity, $price,$size);
 
 }
else if($_POST['Desired_Action'] == "Deleting") //remove from cart case
 {
    
    $basket->deleteItem($_POST['code'], $_POST['name']);
 }
 else if ($_POST['Desired_Action'] == "RemoveAll")
 {
    // $basket->emptyCart();
    session_unset();
	session_destroy();
   
 }

if(isset($_GET['id']))
		{
		    $t=$_GET['id'];
			 $basket->deleteItem($t);
		 }

 //end of loop


	   //========================================html
	  ?>
	<div class="container">
	   <div>
	    <h1> Check out</h1>
		</div>
		<br>
		<div>
		
 

<table border=\"2\"><tr><td>Item#</td><td>Product ID</td><td>Product Name</td><td>Size</td> <td> Quantity </td> <td>Price/item</td> <td>Cost</td><td>Remove</td></tr>
<?php
reset($session_basket);
session_start();
$_SESSION['basket']=serialize($session_basket);//copy basket
$i=0;
$t=0;
while(list($k, $v) = each($session_basket)) {
$i++;

$item = $session_basket[$k];
$image = "" . $item->code . ".png";
$t=$t+($item->price*$item->quantity);

 $_SESSION['cost']=$t;
?>
<tr>
<td><?php echo $i .")" ; ?>,<img src="product/<?php echo $item->code; ?>a.png" width="50" height="60"></td>
<td><?php echo $item->code; ?> </td>
<td><?php echo $item->name; ?> </td>
<td><?php echo $item->size; ?> </td>
<td><?php echo $item->quantity; ?> </td>
<td><?php echo $item->price; ?> </td>
<td><?php echo ($item->price*$item->quantity); ?> </td>
<td> <a href="cart.php?id=<?php echo $item->code;?>">remove</a> </td>
</tr>

<?php
if(isset($_POST['remove'])) { 
  deleteItem($item->code, $item->name);
 } 
} //end of loop

?>

</table>

   
Total: <?php echo $t; ?>
</div>
		<div>
    <p>&nbsp;    </p>
	    <p>
		<form method="post" action="userInfo.php" id="form2">
		<input type="hidden" name="cost" value="<?php echo $t; ?>">
		<input type="hidden" name="cost_Action" value="Cost">
		 <button type="submit" class="btn btn-primary" id="btn" >Check Out</button>
		 </p></div>
              </p>
	     </form>
		 <div>
		 <td>
		 <form method="post">
		    <input type="hidden" name="Desired_Action" value="RemoveAll">
			<input type="submit" class="btn btn-primary"  value="Empty cart">
		 </form>
		 </td>
		 </div>
    <!-- InstanceEndEditable --></div>
	<div id="footer" class="container"><img src="gap.png" width="1250"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
<!-- InstanceEnd --></html>