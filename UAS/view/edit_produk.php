<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$fullName = $_SESSION['full_name'] ?? 'Admin'; // Default to 'Admin' if full name is not set

include "../db.php";

// Fetch product for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    
    // Handle file upload
    $target_dir = "img/";
    if ($_FILES["image"]["name"]) {
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = $target_file;
    } else {
        $image = $product['image']; // Keep the old image if not updated
    }
    
    $sql = "UPDATE products SET name='$name', price='$price', type='$type', description='$description', image='$image' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin_home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>Edit Product</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' />
    <link rel='stylesheet' href='../css/style.css'>
</head>
<body>
    <br>
    <div class='container'>
        <h1>Edit Produk</h1>
        <form action='' method='POST' enctype='multipart/form-data'>
            <div class='mb-3'>
                <label for='name' class='form-label'>Nama Produk</label>
                <input type='text' class='form-control' name='name' value='" . $product['name'] . "' required>
            </div>
            <div class='mb-3'>
                <label for='price' class='form-label'>Harga</label>
                <input type='number' class='form-control' name='price' value='" . $product['price'] . "' required>
            </div>
            <div class='mb-3'>
                <label for='type' class='form-label'>Type</label>
                <input type='text' class='form-control' name='type' value='" . $product['type'] . "' required>
            </div>
            <div class='mb-3'>
                <label for='description' class='form-label'>Deskripsi</label>
                <textarea class='form-control' name='description' required>" . $product['description'] . "</textarea>
            </div>
            <div class='mb-3'>
                <label for='image' class='form-label'>Foto Produk</label>
                <input type='file' class='form-control' name='image'>
                <img src='../" . $product['image'] . "' alt='Current Image' style='width: 100px; margin-top: 10px;'>
            </div>
            <div class='d-flex justify-content-between'>
                <button type='submit' class='btn btn-primary'>Update Produk</button>
                <a href='../admin_home.php' class='btn btn-warning'>Kembali</a>
            </div>
        </form>
    </div>
    <br>
    
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>";

echo "</body>
</html>";

$conn->close();
?>