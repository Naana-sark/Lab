<?php
//connect to database class
require("../Settings/db_class.php");

/**
*User class to handle everything user related
*/
/**
 *@author Naana Sarkodie
 *
 */
class customer_class extends db_connection
{
	/**
	*method to add new user 
	*takes the name, email, password, country, city, contact, image and user role
	*/
	public function add_new_customer($a, $b, $c, $d, $e, $f, $g){

		//write the sql query to add new user
		$sql = "INSERT INTO `customer`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`,`customer_role`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', $g ,2 )";
		
		//return the executed the query
		return $this->db_query($sql);
	}

	/**
	*method to edit a user
	*takes the id, name, number, email, password, country, city, contact and image
	*/
	public function edit_a_customer($a, $b, $c, $d, $e, $f, $g, $h){
		
		//write the sql query to edit user
		$sql = "UPDATE `customer` SET `customer_name`='$b', `customer_email`='$c', `customer_pass`='$d', `customer_country`='$e', `customer_city`='$f', `customer_contact`='$g', `customer_image`='$h'  WHERE `customer_id`= '$a'";
		
		//return the executed the query
		return $this->db_query($sql);
	}

	/**
	*method to delete a user using an id
	*takes the id
	*/
	public function delete_a_customer($a){
		
		//write the sql query to delete user
		$sql = "DELETE FROM `customer` WHERE `customer_id` = '$a'";

		//return the executed the query
		return $this->db_query($sql);
	}


	/**
	*method to check if user mail already exists
	*takes the mail
	*/
	public function verifymail($cusemail){
		
		//write the sql query to check if name exists
		$sql = "SELECT `customer_email` FROM `customer` WHERE `customer_email` = '$cusemail'";

		//return the executed the query
		return $this->db_query($sql);
	}


	/**
	*method for login informaton 
	*/
	public function verify_login($vlog){
		//a query to get all login information base on email
		$sql = "SELECT * FROM `customer` WHERE `customer_email` = '$vlog'";

		//execute the query
		return $this->db_query($sql);
	}

}

?>