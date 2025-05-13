<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . '/../connection.php';

// SQL query to fetch all records from the `portofolio` table along with the username of the user who added them
$query = "SELECT p.*, u.username FROM portofolio p JOIN users u ON p.user_id = u.user_id";
$result = mysqli_query($conn, $query);

// Check if the query execution was successful
if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

// Fetch data from the result and store it in the $articles array
while ($data = mysqli_fetch_array($result)) {
    $articles[] = $data;
}

// Close the database connection
mysqli_close($conn);

// Check if there are any articles to display
if (count($articles)) {
    // Loop through each article and generate HTML output
    foreach ($articles as $article) {
        echo '<div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-' . htmlspecialchars($article['category']) . '">' .
            '<div class="portfolio-content h-100">' .
            '<img src="' . htmlspecialchars($article['image_source']) . '" class="img-fluid" alt="">' .
            '<div class="portfolio-info">' .
            '<h4>' . htmlspecialchars($article['title']) . '</h4>' .
            '<h3 class="username">Added by: ' . htmlspecialchars($article['username']) . '</h3>' .
            '<p>' . htmlspecialchars($article['description']) . ' <br>  price:' . htmlspecialchars($article['price']) . '$</p>' .
            '<a href="addtobasket.php?portofolio_id=' . htmlspecialchars($article['portofolio_id']) . '" title="Add to Basket" class="details-link"><i class="bi bi-basket"></i></a>' .
            '<a href="' . htmlspecialchars($article['image_source']) . '" title="' . htmlspecialchars($article['title']) . '" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>' .
            '</div>' .
            '</div>' .
            '</div>';
    }
} else {
    // If no articles are found, display a message
    echo 'There are no articles here.';
}
?>