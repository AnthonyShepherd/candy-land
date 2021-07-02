<?php
include "db.php";

$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$mobile = $_POST['mobile'];
$address1 = $_POST['address1'];
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";

// Check for Empty Fields.
if (empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) || empty($mobile) || empty($address1) ) {
    echo "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>All fields should be filled in.</b>
    </div>
    ";
    exit();
}

// email validation
if (!preg_match($emailValidation,$email)) {
    echo "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>This $email is not valid.</b>
    </div>
    ";
    exit();
}

// Check that passwords match
if ($password != $repassword) {
    echo "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Passwords do not match.</b>
    </div
    ";
}

//Phone number validation > Numbers only and 10 digits.
if (!preg_match($number,$mobile)) {
    echo "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Mobile number $mobile is not valid</b>
    </div>
    ";
    exit();
}
if(!(strlen($mobile) == 10)){
    echo "
	<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Mobile number must be 10 digit</b>
	</div>
    ";
    exit();
}

// check existing email
$sql = "SELECT id FROM user_info WHERE email ='$email' LIMIT 1";
$check_query = mysqli_query($con ,$sql );
$count_email = mysqli_num_rows($check_query);
if ($count_email > 0 ) {
    echo "
    <div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Account with this email already exists</b>
    </div>
    ";
    exit();
} else {
    $password = md5($password);
    $sql = "INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`, `address1`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
        '$password', '$mobile', '$address1')";
    $run_query = mysqli_query($con,$sql);
    if ($run_query) {
        echo "
        <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>Successfully Registered</b>
        </div>
        ";
    }
}


?>