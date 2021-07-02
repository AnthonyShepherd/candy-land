<?php
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);

session_start();
if($_SESSION["uid"])
{
    header("location:profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title >Candy Land</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
   
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top"> 
    <div style="background-color:#613F75"  class="container-fluid"> 
        <div  class="navbar navbar-header"> 
            <a style="color:white" href="#" class="navbar-brand"> Candy Land</a>
        </div>
        <ul class="nav navbar-nav">
            <li style="width:300px;left:60px;top:10px;"><input type="text" class="form-control" id="search"></li>
            <li style="top:10px;left:90px;"><button style="background-color:#EF798A;color:white;" class="btn btn-primary" id="search_btn">Search</button></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li> <a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-cart-plus"></i> Cart <span class="badge">0</span></a>
            <div class="dropdown-menu" style="width:600px;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">SL.NO</div>
                            <div class="col-md-2">Product image</div>
                            <div class="col-md-2">Product name</div>
                            <div class="col-md-2">Qty</div>
                            <div class="col-md-2">Prices in R</div>
                        </div>
                    </div>
                    <div class="panel-body"><b>login to add cart</b></div>
                    <div class="panel-footer">>
                    </div>
                </div>
            </div>
            </li>

            <li> <a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-sign-in-alt"></i>Sign In</a>
            <!--signin dropdown -->
            <ul class="dropdown-menu">
            <div style="width:300px;">
                <div style="background-color:#B4E1FF; color:#613F75" class="panel panel-primary">
                <div style="background-color:#B4E1FF;color:#613F75;font-weight:bold" class="panel-heading">Login</div>
                <div style="background-color:#B4E1FF;color:#613F75" class="panel-heading"> 
                <form onsubmit="return false" id="login">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required/>
                <label for="email">Password</label>
                <input type="password" class="form-control" name="password" id="password" required/>
                <p><br/></p>
                <input style="background-color:#EF798A;color:white;float:right ;" type="submit" class="btn btn-success" id = "Login" value="login">
                </form>
                </div>
                <div style="background-color:#B4E1FF;" class="panel-footer" id="e_msg"></div>
                </div>
                </div>       
            </ul>
            </li>
            <li> <a style="color:white" href="registerForm.php"><i class="fas fa-user-plus"></i>Register</a></li>
        </ul>
    </div>
</div>

<!-- side-->
<p><br/></p>
<p><br/></p>
<p><br/></p>


<div class="container-fluid"> 
    <div class="row">
        <div  class="col-md-1"></div>
        <div class="col-md-2">

         <div id="get_category">

         </div>   

          <!--  <div class="nav nav-pills nav-stacked"> 
                <li class="active"><a href="#"><h4>Categories</h4></a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
            </div> -->
            <div id="get_brand">

            </div>  
           <!-- <div class="nav nav-pills nav-stacked"> 
                <li class="active"><a href="#"><h4>BRANDS</h4></a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
            </div> -->
        </div>

        <div class="col-md-8">
        <div class="row">
            <div class="col-md-12" id="product_img"> 
            </div>
        </div>
            <div class="panel panel-info">
            <div style="background-color:#B4E1FF" class="panel-heading">Products</div>
            <div  class="panel-body">  
            <div id="get_product">
            <!--here we get product details from ajax -->

            </div>
              <!--  <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">Samsung Glaxy</div>
                        <div class="panel-body"> <img src="product_images/images.jpg"/></div>
                        <div class="panel-heading">$500.00
                            <button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
                        </div>
                        </div>
                    </div> -->
                
            </div>
            <div class="panel-footer"></div>
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
    </div>

</body>
</html>