<?php

session_start();
include "db.php";

// Displays the Catagories on the right hand panel 
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a style='background-color:#F5FFC6;color:#613F75' href='#'><h4>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["id"];
			$cat_name = $row["name"];
			echo "
					<li><a style='color:#613F75' href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}


// Displays the Brands on the right hand panel
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a style='background-color:#F5FFC6;color:#613F75' href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["id"];
			$brand_name = $row["name"];
			echo "
					<li><a style='color:#613F75' href='#' class='selectbrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}

// Get the total page numbers and display on the bottom of the site.
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
    $pageno = ceil($count/9);
    
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}

// Get 9 products to be displayed on the 1st page.
if(isset($_POST["getproduct"])) {
    $limit = 9;
    if(isset($_POST["setpage"])) {
       $pageno = $_POST["pageno"];
       $start  = ($pageno * $limit) - $limit ;
    }else { $start = 0;}

    $product_query = "SELECT * FROM products  LIMIT $start,$limit";
    $run_query = mysqli_query($con,$product_query);
    
    if(mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $pro_id    = $row['id'];
			$pro_cat   = $row['category_id'];
			$pro_brand = $row['brand_id'];
			$pro_name = $row['name'];
			$pro_price = $row['price'];
            $pro_image = $row['image'];
            echo "
            <div class='col-md-4'>
                    <div class='panel panel-info'>
                        <div style='background-color:#B4E1FF;color:#613F75' class='panel-heading'>$pro_name</div>
                        <div class='panel-body'> <img src='product_images/$pro_image' style='width:160px; height:250px;/></div>
                        <div class='panel-heading'>R$pro_price.99
                        <button pid='$pro_id' id='product' style='float:right;' class='btn btn-danger btn-xs'>Add To Cart</button>
                    </div>
                    </div>
                    </div>
            
            ";
        }
    }
}



// Displays products by Filtering Options by Category, Brand or Searching for Keywords. 
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectbrand"])  || isset($_POST["search"])){
    
    if(isset($_POST["get_seleted_Category"])){
        $id = $_POST["cat_id"];
        $sql = "SELECT * from products WHERE catagory_id = $id";

    }else if(isset($_POST["selectbrand"])){
        $id = $_POST["brand_id"];
        $sql = "SELECT * from products WHERE brand_id = $id";
    } else {
        $keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE keywords LIKE '%$keyword%'";
    }

   
    $run_query = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($run_query)){
            $pro_id    = $row['id'];
			$pro_cat   = $row['category_id'];
			$pro_brand = $row['brand_id'];
			$pro_name = $row['name'];
			$pro_price = $row['price'];
            $pro_image = $row['image'];
            echo "
            <div class='col-md-4'>
                    <div class='panel panel-info'>
                        <div style='background-color:#B4E1FF;color:#613F75' class='panel-heading'>$pro_name</div>
                        <div class='panel-body'> <img src='product_images/$pro_image' style='width:160px; height:250px;/></div>
                        <div class='panel-heading'>R.$pro_price.99
                        <button pid='$pro_id' id='product' style='float:right;' class='btn btn-danger btn-xs'>AddToCart</button>
                    </div>
                    </div>
                    </div>
            
            ";
    }
}

// Add a product to the Cart Table on the Database
if(isset($_POST["addProduct"])){
    if (isset($_SESSION["uid"])) {
        $p_id = $_POST["proId"];
        $user_id = $_SESSION["uid"];
        $sql = "SELECT * FROM cart WHERE product_id = '$p_id' AND user_id = '$user_id' ";
        $run_query = mysqli_query($con,$sql);
        $count = mysqli_num_rows($run_query);
        if ($count   > 0) {
            echo "
            <div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Product has been added already</b>
            </div>   
            ";
        }else {
            $sql = "SELECT * FROM products WHERE id='$p_id'";
            $run_query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($run_query);
        
            $id=  $row["id"];
            $pro_price=$row["price"];
            
        $sql="INSERT INTO `cart` (`id`, `product_id`, `user_id`, `qty`, `price`, `total_amt`) 
        VALUES (NULL, $p_id, $user_id, '1', '$pro_price', '$pro_price');";  

        if(mysqli_query($con,$sql)) {
            echo "
            <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Product added to Cart</b>
            </div>
            ";
        }
        }

    }else {
       echo "
       <div class='alert alert-danger'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <b>Please Sign in or Register to add to Cart</b>
       </div>   
       ";
    }

}



// Populate the Cart section uses a view that combines Cart and Product Data
if (isset($_POST["get_cart_product"])){
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM Cart_Products WHERE user_id='$uid'";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    if ($count > 0 ) {
        $no =1;
        $total_amt =0;
        while ($row = mysqli_fetch_array($run_query)) {
            $id = $row["id"];
            $pro_id =$row["product_id"];
            $pro_name = $row["product_name"];
            $pro_image = $row["product_image"];
            $pro_price=$row["price"];
            $qty = $row["qty"];
            $total = $row["total_amt"];
            $price_array = array($total);
            $total_sum = array_sum($price_array);
            $total_amt = $total_amt +$total_sum ;

            if (isset($_POST["get_cart_product"])) {
                echo "
                <div class='row'>
                    <div class='col-md-2'>$no</div>
                    <div class='col-md-2'><img src='product_images/$pro_image' width='60px' height='50px'></div>
                    <div class='col-md-2'>$pro_name</div>
                    <div class='col-md-2'>$qty</div>
                    <div class='col-md-2'>R$pro_price.00</div>
                </div>
                
                ";
                $no = $no + 1 ;
            }else {
                echo "
                <div class='row'> 
                    <div class='col-md-2'>
                    <div class='btn-group'>
                       <a href='#' remove_id='$pro_id' class='btn btn-danger remove'><i class='fa fa-trash' aria-hidden='true'></i></a> 
                       <a href='#' update_id='$pro_id' class='btn btn-primary update'><i class='far fa-edit'></i></i></a> 
                    </div>
                    </div>
                    <div class='col-md-2'><img src='product_images/$pro_image' width='60px' height='50px'></div>
                    <div class='col-md-2'>$pro_name</div>
                    <div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled ></div>
                    <div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty'  ></div>
                    <div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled ></div>
                    </div>
                
                ";
            }

          
        }
    }
}

// Remove Everything from the users Cart on Checkout
if(isset($_POST["removeFromCart"])) {;
    $uid = $_SESSION["uid"];
    $sql = "DELETE FROM cart WHERE user_id = '$uid'";
    $run_quey = mysqli_query($con,$sql);
    if($run_quey) {
        echo "
            <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Products Checkout. Enjoy!</b>
            </div>
            ";
    }
}

?>