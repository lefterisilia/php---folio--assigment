<?php
include 'connection.php';
session_start();

// Check if the user is logged in
if (!isset($_COOKIE["username"])) {
    echo "<script>alert('You need to log in to access the basket.'); window.location.href = 'loginsignup%20together.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'index files/head.php' ?>
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <?php include("index files/NavBar.php"); ?>
    </div>
</header>

<main class="main">
    <section id="hero" class="section dark-background">
        <div class="section-title">
            <h2>Basket</h2>
            <p>Review the products in your basket</p>
        </div>
    </section>

    <!-- Basket Section -->
    <section id="basket" class="basket section">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Fetch basket items from the database
                        $username = $_COOKIE["username"];
                        $user_query = "SELECT user_id FROM users WHERE username='$username'";
                        $user_result = mysqli_query($conn, $user_query);
                        $user_data = mysqli_fetch_assoc($user_result);
                        $user_id = $user_data['user_id'];

                        $sql = "SELECT p.title AS product_name, p.price, b.quantity, (p.price * b.quantity) AS total, b.portofolio_id 
                                FROM basket b 
                                JOIN portofolio p ON b.portofolio_id = p.portofolio_id 
                                WHERE b.user_id='$user_id'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                            <td>{$row['product_name']}</td>
                                            <td>{$row['price']}</td>
                                            <td>{$row['quantity']}</td>
                                            <td>{$row['total']}</td>
                                            <td><a href='removefrombasket.php?portofolio_id={$row['portofolio_id']}' class='btn btn-danger'>Remove</a></td>
                                          </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Your basket is empty.</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include("index files/Footer.php"); ?>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/typed.js/typed.umd.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>