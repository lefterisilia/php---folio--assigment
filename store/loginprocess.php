<?php
include "connection.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($role == "seller") {
    $seller = 1; $customer = 0;
} else if ($role == "customer") {
    $seller = 0; $customer = 1;
}

if ($role == "seller") {
    $sql = "SELECT user_id, username, password FROM users WHERE username='$username' AND password='$password'";
    $sql_role = "SELECT user_id, username, password, seller FROM users WHERE username='$username' AND password='$password' AND seller='$seller'";

    $result = $conn->query($sql);
    $result_role = $conn->query($sql_role);
    if ($result->num_rows > 0 && $result_role->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        setcookie("user_id", $user_data['user_id'], time() + (86400 * 30), "/");
        setcookie("username", $username, time() + (86400 * 30), "/");
        setcookie("role", $role, time() + (86400 * 30), "/");
        header("Location: index.php");
    } else if ($result->num_rows == 0) {
        header("location:loginsignup together.php?loginFailed=true&reason=password");
    } else if ($result_role->num_rows == 0) {
        header("location:loginsignup together.php?loginFailed=true&reason=role");
    }
} else {
    $sql = "SELECT user_id, username, password FROM users WHERE username='$username' AND password='$password'";
    $sql_role = "SELECT user_id, username, password, customer FROM users WHERE username='$username' AND password='$password' AND customer='$customer'";

    $result = $conn->query($sql);
    $result_role = $conn->query($sql_role);
    if ($result->num_rows > 0 && $result_role->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        setcookie("user_id", $user_data['user_id'], time() + (86400 * 30), "/");
        setcookie("username", $username, time() + (86400 * 30), "/");
        setcookie("role", $role, time() + (86400 * 30), "/");
        header("Location: index.php");
    } else if ($result->num_rows == 0) {
        header("location:loginsignup together.php?loginFailed=true&reason=password");
    } else if ($result_role->num_rows == 0) {
        header("location:loginsignup together.php?loginFailed=true&reason=role");
    }
}
$conn->close();
?>