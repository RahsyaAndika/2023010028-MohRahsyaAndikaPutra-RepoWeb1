<?php
include 'db.php';

// Fungsi untuk menambah produk
function addProduct($name, $price, $description, $image) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $name, $price, $description, $image);
    $stmt->execute();
    $stmt->close();
}

// Fungsi untuk melihat produk
function getProducts() {
    global $conn;
    $result = $conn->query("SELECT * FROM products");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fungsi untuk mengupdate produk
function updateProduct($id, $name, $price, $description, $image) {
    global $conn;
    $stmt = $conn->prepare("UPDATE products SET name=?, price=?, description=?, image=? WHERE id=?");
    $stmt->bind_param("sdssi", $name, $price, $description, $image, $id);
    $stmt->execute();
    $stmt->close();
}

// Fungsi untuk menghapus produk
function deleteProduct($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>