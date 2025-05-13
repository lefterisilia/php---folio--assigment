<?php
include 'connection.php';


// Check if the user is logged in and is a seller

if (!isset($_COOKIE["username"]) || $_COOKIE["role"] !== "seller") {
    echo "<script>alert('You need to sign up as a seller to access this page.'); window.location.href = 'loginsignup%20together.php';</script>";
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
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between ">
        <?php include("index files/NavBar.php"); ?>
    </div>
</header>

<main class="main">
    <section id="hero" class="section dark-background">
        <div class="section-title">
            <h2>Add Product</h2>
            <p>Fill in the details of the product you want to add</p>
        </div>
    </section>

    <!--Add Product Section -->
    <section id="addproduct" class="addproduct section">
        <div class="container" data-aos="fade-up">

            <form action="addproductprocess.php" method="POST" enctype="multipart/form-data" class="form" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="productname">Product Name</label>
                        <input type="text" name="productname" class="form-control" id="productname" placeholder="Product Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label for="productprice">Product Price</label>
                        <input type="number" name="productprice" class="form-control" id="productprice" placeholder="Product Price" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group mt-3">
                        <label for="productcategory">Product Category</label>
                        <select name="productcategory" class="form-control" id="productcategory" required>
                            <option value="">Select a category</option>
                            <option value="app">app</option>
                            <option value="product">product</option>
                            <option value="branding">branding</option>
                            <option value="books">books</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="col-md-6 form-group mt-3">
                        <label for="productimage">Product Image</label>
                        <input type="file" name="productimage" class="form-control" id="productimage" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group mt-3">
                        <label for="productdescription">Product Description</label>
                        <textarea class="form-control" name="productdescription" id="productdescription" rows="5" placeholder="Product Description" required></textarea>
                    </div>
                </div>
                <div class="text-center mt-4"><button type="submit" class="btn btn-primary">Add Product</button></div>
            </form>

        </div>

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
