<?php
include 'db.php';

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$image = $_FILES['image']['name'];
$target = "images/" . basename($image);

// Simpan gambar ke folder images
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    // Masukkan data produk ke database
    $sql = "INSERT INTO products (name, price, description, image) VALUES ('$name', '$price', '$description', '$target')";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
    } else {
        echo "Gagal mengupload gambar.";
    }
    $conn->close();
}
    ?>