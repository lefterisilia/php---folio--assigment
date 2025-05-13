<html>
<head>
<title>Register Page</title>
</head>
<body>


<?php

if(isset($_COOKIE["username"])) {
	header("Location: index.php");
}

else{
	echo "<form action='regprocess.php' method='POST'>
  <div class='container'>
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
	
	<label for='firstname'><b>First Name</b></label>
    <input type='text' placeholder='Enter First Name' name='firstname' required>
	<br><br>
    <label for='lastname'><b>Last Name</b></label>
    <input type='text' placeholder='Enter Last Name' name='lastname' required>
	<br><br>
    <label for='username'><b>Username</b></label>
    <input type='text' placeholder='Enter Username' name='username' required>
	<br><br>
    <label for='password'><b>Password</b></label>
    <input type='password' placeholder='Enter Password' name='password' required>
	<br><br>
    <label for='password_rpt'><b>Repeat Password</b></label>
    <input type='password' placeholder='Repeat Password' name='password_rpt' required>
	<br><br>
	<input type='checkbox' id='seller' name='seller' value='Seller'>
	<label for='seller'> Seller</label><br>
	<input type='checkbox' id='customer' name='customer' value='Customer'>
	<label for='customer'>Customer</label><br>
    <hr>
    <p>By creating an account you agree to our <a href='#'>Terms & Privacy</a>.</p>
    <button type='submit' class='registerbtn'>Register</button>
  </div>

  <div class='container register'>
    <p>Already have an account? <a href='login.php'>Sign in</a>.</p>
  </div>
</form>";
	}

?>

</body>
</html>