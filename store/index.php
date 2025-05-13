
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

	<!-- Hero Section -->
	<section id="hero" class="hero section dark-background">

		<img src="assets/img/lefterispic.jpg" alt="" data-aos="fade-in">

		<div class="container" data-aos="fade-up" data-aos-delay="100">
			<?php include("index files/hero.php"); ?> <!-- hero section is the picture  and the lefteris busineess -->
		</div>

	</section><!-- /Hero Section -->


	<!-- Portfolio Section -->
	<section id="portfolio" class="portfolio section">

		<!-- Section Title -->
		<div class="container section-title" data-aos="fade-up">
			<h2>Products</h2>
			<p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
		</div><!-- End Section Title -->

		<div class="container">

			<div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

				<ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
					<li data-filter="*" class="filter-active">All</li>
					<li data-filter=".filter-app">App</li>
					<li data-filter=".filter-product">Product</li>
					<li data-filter=".filter-branding">Branding</li>
					<li data-filter=".filter-books">Books</li>
				</ul><!-- End Portfolio Filters -->

				<div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

					<?php include 'index files/populate.php';?>


				</div><!-- End Portfolio Container -->

			</div>

		</div>

	</section><!-- /Portfolio Section -->

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
