<?php

//start session
session_start();
//linking the connectDB file
require_once('connect/connectDB.php');
//linking the functions file
require_once('functions.php');
//this if statement checks to see if the Add button is pressed
if (isset($_POST['add'])){
   //this sees if the 'cart' is declared
    if(isset($_SESSION['cart'])){
        //picks out the product_id column in cart array
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        //this if statement checks to see if multiple items are in cart and doesnt allow addition of item
        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'project.php'</script>";
        }else{
            //counts items in cart and 
            $count = count($_SESSION['cart']);
            //mapping names in associative array.
            //It took so long to figure out the quantity must be in here!
            //Should have just left quantity out and used a JS function but oh well..
            $item_array = array(
                'product_id' => $_POST['product_id'],
                'item_quantity' => $_POST["quantity"],
            );
            //associative array containing session variables
            $_SESSION['cart'][$count] = $item_array;
            }
          

        }else{
            //very nested if statements so 
           $item_array = array(
                'product_id' => $_POST['product_id'],
                'item_quantity' => $_POST["quantity"],
            );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
//this updates quantity.
if (isset($_POST['updateQty'])){
    foreach($_SESSION['cart'] as $key=>$cartItem){
        if ($cartItem['product_id']==$_POST['product_id']){
            $_SESSION['cart'][$key]['item_quantity']=$_POST['quantity'];

        }

    }
    
    // header('location: project.php');
    // exit();
}
//this section functions the remove button and gives an alert for the removal
if (isset($_POST['remove'])){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] ==$_POST['product_id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'project.php'</script>";
            }
        }
    
  }
if (isset($_POST['quantity'])){
    foreach($_SESSION['cart'] as $key => $value){
    //    $value = $quantity * $value;
}
}
?>
<!doctype html>
<html lang="en">
  <head>

   <title>The Wild Music Shop</title>
   <!-- Link my small CSS file -->
   <link rel="stylesheet" href="myCSS/somecss.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	
	

</head>
<body>

<!-- The NAvbar-->
<nav class="navbar sticky-top navbar-expand-xl bg-dark navbar-dark" id = "navBar">
<!-- Little picture and link to home-->
	  <a class="navbar-brand" href="#">
		<img src="images/musicalnote.png" alt="logo" style="width:40px;">
	  </a>
  
	  <ul class="navbar-nav mr-auto">
    <!-- Link to home -->
		<li class="nav-item active">
		  <a class="nav-link" href="#">Home</a>
		</li>
    <!-- Little dropdown menu(just redirects to this page but in future could link to seperate page) -->
		<li class="nav-item dropdown ">
		  <a class="nav-link dropdown-toggle" href="#" id="theDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
			   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Double Bass</a>
					<a class="dropdown-item" href="#">Didgeridoo</a>
					<a class="dropdown-item" href="#">Flute</a>
					<a class="dropdown-item" href="#">Guitar</a>
				</div>
		</li>
		<li class="nav-item">
      <!-- Again just links to the page! -->
		  <a class="nav-link" href="#">Contact Us</a>
		</li>
		 </ul>
		 
		 <ul class="navbar-right">
		   <form class="form-inline">
           <!-- Setting up the Modal pop up link for the login -->
           <a href="#myModal" class="trigger-btn" data-toggle="modal">Login</a>
        <!-- This is the shopping cart, using a bootstrap icon and adding what's in cart -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="project.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php
                        //This checks to see if the cart is initialised, and if so, creates a variable
                        //$count, which will sums up all variables in cart and displays them.
                        //If the session varable is not set it displays 0.
                        if (isset($_SESSION['cart'])){ 
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-white\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-white\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>
		</form>
		</li>
		
</nav>

<!-- The log in modal. It appears on page download, and if login is presed -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
      <!-- The form calls the login() JS function here as well -->
			<form action="project.php" method="post" onsubmit="return login()" name="registration">
				<div class="modal-header">				
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>Username</label>
						<input type="text" id = "username" class="form-control" required="required">
					</div>
          <div class="form-group">
						<label>Email</label>
						<input type="email" id = "email" class="form-control" required="required">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Password</label>
						<input id = "pass" type="password" class="form-control" required="required">
					</div>
				</div>
        </div>
				<div class="modal-footer justify-content-between">
					<label class="form-check-label"><input type="checkbox"> Remember me</label>
                    
                    <button  type="submit" class="btn btn-secondary btn-block" id="Login">Log In</button>
					 
				</div>
			</form>
		</div>
	</div>
</div>     
<!-- The changing banner! -->
	<div class = "container-fluid" id="banner-load"></div>

	<!-- the cards -->
	<div class = "container" id="thecards">
		<div class = "row text-center py-5">
    <!-- This php code calls the function displayitems from the database.
    The mysqli_fetch_assoc() will take the rown of the associative array and
    the values are used for the function. -->
		<?php
      
			   $sql = "select * from Instruments; ";
			   
			   $result = mysqli_query($connection,$sql);
				while ($row = mysqli_fetch_assoc($result)){
					displayitems($row['InstName'], $row['Price'], $row['ProductImg'], $row['description'], $row['ItemNo']);
				}
			   ?>  
		</div>
	</div>
  <!-- Some space -->
<?php
{
}
?>
<!-- The Shopping Cart. At this stage I regret the choice of PHP... -->
  <div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6 class="text-white">My Cart</h6>
                <hr>

                <?php
                //Initial $total set to 0
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        //Loop through cartItem and 
                        foreach($_SESSION['cart'] as $cartItem){
                          //set $product_id as product_id in cart
					            	$product_id = $cartItem['product_id'];
                        // set $prodQty as the product_quantity in cart
                        $prodQty = $cartItem['item_quantity'];
                        //sql statement getting itemNo from DB
                        $sql = "select * from Instruments where ItemNo=$product_id; ";
                      //Storing sql query as $result
			   		        	$result = mysqli_query($connection,$sql);
                       //get row of associated array
                        $row = mysqli_fetch_assoc($result);
                        //stick these row values into funtion cartelement
                        cartElement( $row['ProductImg'],$row['InstName'],$row['Price'], $row['ItemNo'], $prodQty );
                        $total = $total+($prodQty * $row['Price'] )  ; 
                    }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <!-- Div for Price Details -->
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-dark text-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                      <!-- //Displaying amount of items in cart, if nothing say 0 -->
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        
                        <hr>
                        
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                      <!-- Awkward data total thing needed to get $total into a value the JS can use... -->
                        <h6 id="total-value" data-total=<?php echo $total; ?>>$<?php echo $total; ?></h6>
                        
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                    </div>
                    <!-- //The payment button  it calls the payment function.. you must be logged in!!-->
                    <div><button  id = "payment" onclick="payment()"  class="btn btn-warning my-3">Pay for Order</button></div>
                </div>
            </div>

        </div>
    </div>
</div>

 


    
 
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
  <!-- My JS file link   -->
	<script src="myJS/somejs.js"></script>
    
</html>