<?php
//connect to the user class
require("../Classes/customer_class.php");

/**
*add new user function 
*takes the name, email, password, country, city,image and contact
*/
function add_customer_fun($a, $b, $c, $d, $e, $f, $g){
	//create an instance of user class
	$newcust_object = new customer_class();
	
	//run the add user method
	$insertcust = $newcust_object->add_new_customer($a, $b, $c, $d, $e, $f, $g);
	if ($insertcust){
		//return query result
		return $insertcust;
	}else{
		return false;
	}
}

/**
*edit a user function 
*takes the id, name, email, password, country, city and contact 
*/
function edit_customer_fun($a, $b, $c, $d, $e, $f, $g, $h){
	//create an instance of the user class
	$customer_object = new customer_class();

	//run the update one user method
	$edit_cust = $customer_object->edit_a_customer($a, $b, $c, $d, $e, $f, $g, $h);

	//check if method worked
	if ($edit_cust){
		//return query result
		return $edit_cust;
	}else{
		//return false
		return false;
	}
}

/**
*delete a user function 
*takes the id
*/
function delete_customer_fun($a){
	//create an instance of the user class
	$customer_object = new customer_class();
	
	//run the delete one user method
	$delete_customer = $customer_object->delete_a_customer($a);

	//check if method worked
	if($delete_customer){
	
		//return query result
		return $delete_customer;
	}else{
		//return false
		return false;
	}
}


/**
*check if mail exists function 
*takes the mail
*/
function verify_mail_fun($cusemail){
	//create an instance of the user class
	$customer_object = new customer_class();

	//run the check user mail method
	$verify_mail = $customer_object->verifymail($cusemail);
	
	//check if method worked
	if($verify_mail){
		$vemail = $customer_object->db_fetch();
		//return query result
		return $vemail;	
	}else{
		//return false
		return false;
	}
}

/**
*get login information function 
*takes the mail
*/
function get_login_fxn($uem){
	//Create an array variable
	$login_array = array();

	//create an instance of the login class
	$login_object = new customer_class();

	//run the verify login method using the email
	$login_record = $login_object->verify_login($uem);

	//check if the method worked
	if ($login_record){
		
		//fetch the from the result
        $one_record = array();
		$one_record = $login_object->db_fetch();
		//assign to array
		$login_array[] = $one_record;
	}
	//return array
	return $one_record;
}



?>