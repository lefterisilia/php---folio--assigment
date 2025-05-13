<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Correct the path to the connection.php file
include 'connection.php';
session_start();

// Check if the user is logged in
if (!isset($_COOKIE["username"])) {
    echo "<script>alert('You need to log in to edit products.'); window.location.href = 'loginsignup%20together.php';</script>";
    exit();
}

// Retrieve the user ID from the session or cookie
$username = $_COOKIE["username"];
$user_query = "SELECT user_id FROM users WHERE username='$username'";
$user_result = mysqli_query($conn, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$user_id = $user_data['user_id'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = intval($_POST['product_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $image_source = mysqli_real_escape_string($conn, $_POST['image_source']);

    // Update the product details
    $update_query = "UPDATE portofolio SET title='$title', description='$description', price='$price', category='$category', image_source='$image_source' WHERE portofolio_id='$product_id' AND user_id='$user_id'";
    mysqli_query($conn, $update_query);

    // Redirect to the portfolio page
    header("Location: ../store/#portfolio");
    exit();
}
?>