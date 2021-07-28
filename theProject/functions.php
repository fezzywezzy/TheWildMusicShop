<?php
//A function that is reusable for each item in DB. Everything is 4 star.. Ah sher not too bad. 
//Could add some simple customer review in database and make a function for the stars
//Wasn't sure if they had to be same variable names as DB, they don't have to be, hence the awkward names!
function displayitems($pInstName, $pPrice, $pProductImg, $pdescription, $pproductID){
    $element = "
    
    <div  class=\"col-md-3 col-sm-6 my-3 my-md-0 text-white\">
                <form action=\"project.php\" method=\"post\">
                    <div class=\"card-shadow\">
                        <div>
                            <img src=$pProductImg alt=\"Image1\" class=\"img-fluid\" id=\"cardimages\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Our $pInstName</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\">
                            $pdescription
                            </p>
                            <h5>
                               
                                <span class=\"price\">$$pPrice</span>
                            </h5>
                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart </button>
                            
                            <input type= 'hidden' name='quantity' value='1'>
                            <input type= 'hidden' name='product_id' value='$pproductID'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

// getting cart data from database as a reusable function
function cartElement($productimg, $productname, $productprice, $productid, $quantity){
    $element = "
    
    <form action=\"project.php\" method=\"post\" class=\"cart-items  bg-black\">
                    
                        <div class=\"row bg-dark text-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-3\">
                                <h5 class=\"pt-2\">$productname</h5>
                               
                                <h5 class=\"pt-2\">$$productprice</h5>
                                
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">

                           
                               
                                <input id = \"quantity\" type=\"number\" name=\"quantity\" value=\"$quantity\" />
                                <button type=\"submit\" class=\"btn btn-secondary\" name=\"updateQty\" id =\"UpdateQty\">Update Quantity</button>
                                <input type= 'hidden' name='action' value='remove'>  
                                <input type= 'hidden' name='product_id' value='$productid'> 
                                
                            
                        </div>
                        
                    </div>
                </form>
    
    ";
    echo  $element;
}

