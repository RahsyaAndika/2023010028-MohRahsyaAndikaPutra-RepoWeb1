<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

$sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";

if ($_FILES['image']['name']) {
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $sql = "UPDATE products SET name='$name', price='$price', description='$description', image='$target' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    header("Location: admin.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>