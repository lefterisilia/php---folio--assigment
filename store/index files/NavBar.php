<a href="../store/index.php" class="logo d-flex align-items-center">
    <?php
    if (isset($_COOKIE["username"])) {
        echo "<h2>Welcome to the app, " . htmlspecialchars($_COOKIE["username"]) . "!</h2>";
    } else {
        echo "<h2>Welcome to the app! Guest</h2>";
    }
    ?>
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="../assets/img/logo.png" alt=""> -->
</a>

<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="../store/#hero" class="active">Home</a></li>
        <li><a href="../store/#portfolio">SHOP</a></li>
        <?php if (isset($_COOKIE["username"])): ?>
        <li class="dropdown"><a href="#"><span>MyStore</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="../store/addproduct.php">AddProduct</a></li>
                <li><a href="../store/MyStore.php">EditMyProducts</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <li><a href="../store/basket.php">Basket</a></li>
        <?php
        if (isset($_COOKIE["username"])) {
            echo '<li><a href="../store/logout.php">Logout</a></li>';
        } else {
            echo '<li><a href="../store/loginsignup%20together.php">Login</a></li>';
        }
        ?>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>