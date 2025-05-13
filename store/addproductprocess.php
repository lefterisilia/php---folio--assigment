<?php
include 'connection.php';

function uploadImage($file) {
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return null;
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return null;
        }
    }
}

if(isset($_POST['productname']) && isset($_POST['productprice']) && isset($_POST['productcategory']) && isset($_POST['productdescription']) && isset($_FILES['productimage'])) {
    $productname = $_POST['productname'];
    $productprice = $_POST['productprice'];
    $productcategory = $_POST['productcategory'];
    $productdescription = $_POST['productdescription'];
    $productimage = $_FILES['productimage'];
    $productimagepath = uploadImage($productimage);

    if ($productimagepath) {
        $username = $_COOKIE["username"];
        $user_query = "SELECT user_id FROM users WHERE username='$username'";
        $user_result = mysqli_query($conn, $user_query);
        $user_data = mysqli_fetch_assoc($user_result);
        $user_id = $user_data['user_id'];

        $sql = "INSERT INTO portofolio(title, price, category, description, image_source, user_id) VALUES ('$productname', '$productprice', '$productcategory', '$productdescription', '$productimagepath', '$user_id')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Product added successfully!')</script>";
            header("Location: ../store/#portfolio.php");
            exit();
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "')</script>";
        }
    }
}
?>