<?php
session_start();
if (!isset($_SESSION['full_name']) || !isset($_SESSION['role'])) {
    header("Location: register.php");
    exit();
}

$fullName = $_SESSION['full_name']; // Default to 'User  ' if full name is not set

// Database connection
$host = 'localhost'; // Ganti dengan host database Anda
$db = 'user_management'; // Nama database
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products for display
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Menyertakan header_home.php
include 'header_home.php';

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>Home</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' />
    <link rel='stylesheet' href='fonts/style.css'>
</head>
<body>
    
    <div class='container'>
        <br>
        <h1>Welcome Customer to Daycomp Percetakan!</h1>
        <p>Hello, " . htmlspecialchars($fullName) . "!</p>
    </div>
    
     <div class='container'>
        <br>
        <h4 class='fw-bold'>Semua Produk</h4>
        <div class='row'>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <div class='col-lg-3 mb-2'>
            <div class='card'>
                <img src='" . $row['image'] . "' class='card-img-top' alt='" . $row['name'] . "' />
                <div class='card-body'>
                    <p class='fw-light'>" . $row['name'] . "</p>
                    <p class='fw-bold'>Rp. " . number_format($row['price'], 2) . "</p>
                    <a href='detail_produk.php?id=" . $row['id'] . "' class='btn btn-primary'>Detail</a>
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

// Menyertakan footer.php
include 'footer.php';

echo "</body>
</html>";
?>