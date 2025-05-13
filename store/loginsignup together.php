<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style_login.css">

</head>
<body>
<?php

$reasons = array('password' => 'Wrong Username or Password',
    'role' => 'Not registered for this role.');

if (isset($_COOKIE["username"])) {
    header("Location: index.php");
} else {
    echo '
<section class="forms-section">
<a href="index.php" class="logo d-flex align-items-center" style="text-decoration:none; ">
    <h1 class="section-title">Lefteris Market</h1>
    </a>
    <div class="forms">
        <div class="form-wrapper is-active">
            <button type="button" class="switcher switcher-login">
                Login
                <span class="underline"></span>
            </button>
            <form action="loginprocess.php" method="POST" class="form form-login">
                <fieldset>
                    <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                    <div class="input-block">
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required>
                    </div>
                    <div class="input-block">
                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>
                    </div>
                    <label for="role">Role:</label>
                    <select id="role" name="role">
                        <option value="seller">Seller</option>
                        <option value="customer">Customer</option>
                    </select>
                </fieldset>';

                    if (isset($_GET['error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['loginFailed']) . '</p>';
                    }

              echo '  <button type="submit" class="loginbtn">Login</button>
            </form>
        </div>
        
      
      
        <div class="form-wrapper">
            <button type="button" class="switcher switcher-signup">
                Sign Up
                <span class="underline"></span>
            </button>
            <form action=regprocess.php method="POST" class="form form-signup">
                <fieldset>
                    <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                    <div class="input-block">
                        <input placeholder="Enter First Name" type="text" name="firstname" required>
                    </div>
                    <div class="input-block">
                        <input placeholder="Enter Last Name" type="text" name="lastname" required>
                    </div>
                    <div class="input-block">
                        <input placeholder="Enter  UserName" type="text" name="username" required>
                    </div>
                    <div class="input-block">
                        <input placeholder="Enter Password" type="password" name="password" required>
                    </div>
                    <div class="input-block">
                        <input placeholder=" Repeat Password " type="password" name="password_rpt" required>
                    </div>
                    <label for="role">Role:</label>
                    <select id="role" name="role">
                        <option value="seller">Seller</option>
                        <option value="customer">Customer</option>
                    </select>
                        <p <a href="">Terms & Privacy</a>.</p>

                  </fieldset>
                <button type="submit" class="btn-signup">Continue</button>
            </form>
        </div>
    </div>
</section>';
}
?>
<script>
    const switchers = [...document.querySelectorAll(".switcher")];

    switchers.forEach((item) => {
        item.addEventListener("click", function () {
            switchers.forEach((item) =>
                item.parentElement.classList.remove("is-active")
            );
            this.parentElement.classList.add("is-active");
        });
    });
</script>
</body>
</html>