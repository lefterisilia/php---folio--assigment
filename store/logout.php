<?php

// set the expiration date to one hour ago
setcookie("username", "", time() - 3600, "/");
setcookie("role", "", time() - 3600, "/");

header("Location: loginsignup together.php");
?>