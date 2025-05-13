<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Correct the path to the connection.php file
include 'connection.php';
session_start();

// Check if the user is logged in
if (!isset($_COOKIE["username"])) {
    echo "<script>alert('You need to log in to add items to the basket.'); window.location.href = 'loginsignup%20together.php';</script>";
    exit();
}

// Retrieve the portofolio_id from the URL
$portofolio_id = isset($_GET['portofolio_id']) ? intval($_GET['portofolio_id']) : 0;

// Retrieve the user_id from the session or cookie
$username = $_COOKIE["username"];
$user_query = "SELECT user_id FROM users WHERE username='$username'";
$user_result = mysqli_query($conn, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$user_id = $user_data['user_id'];

// Check if the product is already in the basket
$check_query = "SELECT * FROM basket WHERE user_id='$user_id' AND portofolio_id='$portofolio_id'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // If the product is already in the basket, update the quantity
    $update_query = "UPDATE basket SET quantity = quantity + 1 WHERE user_id='$user_id' AND portofolio_id='$portofolio_id'";
    mysqli_query($conn, $update_query);
} else {
    // If the product is not in the basket, insert a new record
    $insert_query = "INSERT INTO basket (user_id, portofolio_id, quantity) VALUES ('$user_id', '$portofolio_id', 1)";
    mysqli_query($conn, $insert_query);
}

// Debugging output
if (mysqli_affected_rows($conn) > 0) {
    echo "Item added to basket successfully.";
} else {
    echo "Failed to add item to basket.";
}

// Redirect to the basket page
header("Location: basket.php");
exit();
?>