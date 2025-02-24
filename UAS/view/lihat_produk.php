<?php
include "../db.php";

// Fetch product details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
} else {
    die("Product ID not specified.");
}

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>Product Detail</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' />
    <link rel='stylesheet' href='../css/style.css'>
</head>
<body>
    <br><br><br><br><br>
    <div class='container'>
        <div class='row mt-3 justify-content-between'>
            <div class='col-lg-3'>
                <figure class='figure'>
                    <img src='../" . htmlspecialchars($product['image']) . "' class='figure-img img-fluid rounded' alt='" . htmlspecialchars($product['name']) . "' />
                </figure>
            </div>
            <div class='col-lg-5 mb-3'>
                <h5 class='text-uppercase'>" . htmlspecialchars($product['name']) . "</h5>
                <h2 class='fw-bold'>Rp. " . number_format($product['price'], 2) . "</h2>
                <p class='text-uppercase'>" . htmlspecialchars($product['type']) . "</p>
                <nav>
                    <div class='nav nav-tabs' id='nav-tab' role='tablist'>
                        <button class='nav-link fw-bold active' id='nav-home-tab' data-bs-toggle='tab' data-bs-target='#nav-home' type='button' role='tab' aria-controls='nav-home' aria-selected='true'>
                            Detail
                        </button>
                        <button class='nav-link fw-bold' id='nav-profile-tab' data-bs-toggle='tab' data-bs-target='#nav-profile' type='button' role='tab' aria-controls='nav-profile' aria-selected='false'>
                            Info Penting
                        </button>
                    </div>
                </nav>
                <div class='tab-content mb-3' id='nav-tabContent'>
                    <div class='tab-pane fade show active mt-3' id='nav-home' role='tabpanel' aria-labelledby='nav-home-tab' tabindex='0'>
                        " . htmlspecialchars($product['description']) . "
                    </div>
                    <div class='tab-pane fade mt-3' id='nav-profile' role='tabpanel' aria-labelledby='nav-profile-tab' tabindex='0'>
                        <p>Informasi penting tentang produk ini.</p>
                    </div>
                </div>
                <div class='row d-flex align-items-center justify-content-between'>
                    <div class='col-lg-2'>
                        <img src='../img/toko.png' alt='' style='width: 80px; height: 85px' />
                    </div>
                    <div class='col-lg'>
                        <a href='../admin_home.php' class='btn btn-warning'>Kembali</a>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>

<br>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>";

$conn->close();
?>