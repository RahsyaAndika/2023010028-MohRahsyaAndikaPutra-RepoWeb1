<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$fullName = $_SESSION['full_name'] ?? 'Admin'; // Default to 'Admin' if full name is not set

// Database connection
$host = 'localhost'; // Ganti dengan host database Anda
$db = 'user_management'; // Nama database
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    
    // Handle file upload
    $target_dir = "img/"; 
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $sql = "INSERT INTO products (name, price, type, description, image) VALUES ('$name', '$price', '$type', '$description', '$target_file')";
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch products for display
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Include header_admin.php
include 'header_admin.php';

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>Admin Home</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' />
</head>
<body>
    
    <div class='container'>
        <br>
        <h1>Welcome Admin to the Home Page!</h1>
        <p>Hello, admin " . htmlspecialchars($fullName) . "!</p>
        <br>
        <h2>Add New Product</h2>
        <form action='' method='POST' enctype='multipart/form-data'>
            <div class='mb-3'>
                <label for='name' class='form-label'>Product Name</label>
                <input type='text' class='form-control' name='name' required>
            </div>
            <div class='mb-3'>
                <label for='price' class='form-label'>Price</label>
                <input type='number' class='form-control' name='price' required>
            </div>
            <div class='mb-3'>
                <label for='type' class='form-label'>Type</label>
                <input type='text' class='form-control' name='type' required>
            </div>
            <div class='mb-3'>
                <label for='description' class='form-label'>Description</label>
                <textarea class='form-control' name='description' required></textarea>
            </div>
            <div class='mb-3'>
                <label for='image' class='form-label'>Product Image</label>
                <input type='file' class='form-control' name='image' required>
            </div>
            <button type='submit' class='btn btn-primary'>Add Product</button>
        </form>

        <h2>Product List</h2>
        <div class='row'>";
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "
                <div class='col-lg-3 mb-2'>
                    <div class='card'>
                        <img src='" . $row['image'] . "' class='card-img-top' alt='" . $row['name'] . "' />
                        <div class='card-body'>
                            <h5 class='card-title'>" . $row['name'] . "</h5>
                            <p class='card-text'>Rp. " . number_format($row['price'], 2) . "</p>
                            <a href='view/edit_produk.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                            <a href='view/delete_produk.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No products found.</p>";
        }

echo "
        </div>
    </div>
    
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>";

// Include footer.php
include 'footer.php';

echo "</body>
</html>";

$conn->close();
?>