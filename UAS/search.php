<?php
include "db.php";
// Fetch produk yang sesuai dengan inputan
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM products WHERE 
            (LOWER(name) LIKE LOWER('%$keyword%')) OR  
            (name LIKE '%$keyword%')";
    $result = $conn->query($sql);
    $products = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $products = array();
}

// Tampilkan hasil pencarian
if (count($products) > 0) {
    echo "<br><br><br><br><br><br>
    <div class='container'>
    <h2>Hasil Pencarian</h2>";
    echo "<div class='row'>";
    foreach ($products as $product) {
        echo "
        <div class='col-lg-3 mb-2'>
            <div class='card'>
                <img src='" . htmlspecialchars($product['image']) . "' class='card-img-top' alt='" . htmlspecialchars($product['name']) . "' />
                <div class='card-body'>
                    <h5 class='card-title'>" . htmlspecialchars($product['name']) . "</h5>
                    <p class='card-text'>Rp. " . number_format($product['price'], 2) . "</p>
                    <a href='detail_produk.php?id=" . $product['id'] . "' class='btn btn-primary'>Detail</a>
                </div>
            </div>
        </div>
        ";
    }
    echo "</div>
    </div>";
} else {
    echo "<h2>Tidak ada hasil pencarian</h2>";
}

include "header_detail.php";
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' />
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <br>
</body>
</html>
<?php include "footer.php"; ?>