<?php
include "connection.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_rpt = $_POST['password_rpt'];
$role = $_POST['role'];



if ($role == "seller"){
    $seller = 1; $customer = 0;
}
else  {
    $seller = 0;
    $customer = 1;
}
 // echo "Firstname:" . $firstname . 
      // "LastName:" . $lastname . 
	  // "username:" . $username . 
	  // "password:" . $password . 
	  // "password_rpt:" . $password_rpt . 
	  // "seller:" . $seller .
	  // "customer:" . $customer;

	  
	

$sql = "INSERT INTO users (firstname, surname, username, password, seller, customer)
VALUES ('$firstname', '$lastname', '$username', '$password', '$seller', '$customer')";

if ($conn->query($sql) === TRUE) {
    echo "New user account created successfully";
	header("Location: loginsignup together.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>