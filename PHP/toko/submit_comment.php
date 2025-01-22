<?php
include 'db.php';

$product_id = $_POST['product_id'];
$comment = $_POST['comment'];
$username = "User "; // Anda bisa mengganti ini dengan username yang sesuai

$sql = "INSERT INTO comments (product_id, comment, username) VALUES ('$product_id', '$comment', '$username')";

if ($conn->query($sql) === TRUE) {
    header("Location: product.php?id=$product_id");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>