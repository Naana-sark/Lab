<?php 
//connnect to the controller
require_once("../Controllers/customer_controller.php");
include("../Error/error.php");


//initializing variable
$errors = array(); 
 
//check if register button was clicked 
if (isset($_POST['uregister'])) {
	
	//grab register form details 
	$lname = $_POST['uname'];
	$lemail = $_POST['umail'];
	$lpass = $_POST['upass'];
    $lconpass = $_POST['upass1'];
	$lcountry = $_POST['ucountry'];
	$lcity = $_POST['ucity'];
	$lcontact = $_POST['uphone'];
    $limage =  $_POST['uimage'];


//Ensure that form is not empty and is correctly filled
if (empty($lname)){ 
    array_push($errors, "Full Name is required"); 
}
if (empty($lemail)){ 
    array_push($errors, "Email is required"); 
}
if (empty($lpass)){ 
    array_push($errors, "Password is required"); 
}
if (empty($lconpass)){ 
    array_push($errors, "Password is required");
}
    //check if the two passwords match
if ($lpass != $lconpass){
    array_push($errors, "Passwords do not match");
}
if (empty($lcountry)){
    array_push($errors, "Country is Required");
}
if (empty($lcity)){
    array_push($errors, "City is Required");
}
if (empty($lcontact)){
    array_push($errors, "Phone Number is Required");
}
if (empty($limage)){
    array_push($errors, "Image is Required");
}

//check if email exists
$vemail = verify_mail_fun($lemail);
if(!empty($vemail)){
    array_push($errors, "Email already exists");
}

//Register user if there are no errors in the form
if (count($errors) == 0){
    //encrypt password before adding to database
    $password = md5($lpass);

    //add new user
        $addCust = add_customer_fun($lname, $lemail, $password, $lcountry, $lcity, $lcontact, $limage);
        if ($addCust){
            echo "success and redirect to login page";
            echo "<script type='text/javascript'> alert('Successfully Registered');
            window.location.href = 'login.php';
            </script>";
        }else{
            echo "Failed";
        }    
    }else{ 
        echo "<script type='text/javascript'> alert('Registration Failed');              
        window.history.back();
        </script>";
    }  
}


?> 