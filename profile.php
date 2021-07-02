<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

session_start();
// session is not set
if (!isset($_SESSION["uid"])) {
header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candy Land</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
   
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
     integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" 
     crossorigin="anonymous">
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top"> 
    <div style="background-color:#613F75"  class="container-fluid"> 
        <div class="navbar navbar-header"> 
            <a style="color:white"  href="index.php" class="navbar-brand"> Candy Land</a>
        </div>
        <ul class="nav navbar-nav">
            <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
            <li style="top:10px;left:20px;"><button style="background-color:#EF798A;color:white;" class="btn btn-primary" id="search_btn">Search</button></li>
        </ul>
<!-- cart -->
        <ul class="nav navbar-nav navbar-right">
            <li> <a style="color:white" href="c#" id ="cart_container" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-cart-plus"></i> Cart <span class="badge">0</span></a>
            <div class="dropdown-menu" style="width:600px;">
                <div  class="panel panel-success">
                    <div style="background-color:#B4E1FF; color:#613F75" class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">SL.NO</div>
                            <div class="col-md-2">Product Image</div>
                            <div class="col-md-2">Product Name</div>
                            <div class="col-md-2">Qty</div>
                            <div class="col-md-2">Prices in R</div>
                        </div>
                    </div>
                    <div class="panel-body">
                    <div id="cart_product"> 
                    </div>
                    </div>
                    <div class="panel-footer">
                        <button style="background-color:#EF798A;color:white;float:right" class="btn btn-primary" id="checkout_btn">Check Out</button>
                    </div>
                </div>
            </div>
            </li>

            <li> <a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-sign-in-alt"></i> <?php echo $_SESSION["name"]; ?></a>
            <!--signin dropdown -->
            <ul class="dropdown-menu">
                <li><a href="cart.php" style="text-decoration:none; color:blue;">Cart</a></li>
                <li class="divider"></li>
                <li><a href="#" style="text-decoration:none; color:blue;">Change password</a></li>
                <li class="divider"></li>
                <li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
            </ul>
            </li>
           
        </ul>
    </div>
</div>

<!-- side-->
<p><br/></p>
<p><br/></p>
<p><br/></p>


<div class="container-fluid"> 
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">

         <div id="get_category">

         </div>   
            <div id="get_brand">
            </div>  
        </div>

        <div class="col-md-8">
        <div class="row">
            <div class="col-md-12" id="product_img"> 
            </div>
        </div>
            <div class="panel panel-info">
            <div class="panel-heading">Products</div>
            <div class="panel-body">
            <div id="get_product">
            <!--here we get product details from ajax -->

            </div>
            </div>
            <div class="panel-footer">&copy;2017</div>
        </div>
</div>  
        <div class="col-md-1"></div>
    </div>

    <div class ="row">
    <div class="col-md-12">
    <center>
    <ul class="pagination" id="pageno"> 
    <li><a href="#">1</a></li>
  
    </center>
    </div>
    </div>

    </div>

</body>
</html>