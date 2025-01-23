<?php
// Database connection
$host = 'localhost'; // Ganti dengan host database Anda
$db = 'user_management'; // Nama database
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
} else {
    die("Product ID not specified.");
}

include 'header_home.php';

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>Product Detail</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' />
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class='container'>
        <div class='row mt-3 justify-content-between'>
            <div class='col-lg-3'>
                <figure class='figure'>
                    <img src='" . htmlspecialchars($product['image']) . "' class='figure-img img-fluid rounded' alt='" . htmlspecialchars($product['name']) . "' />
                </figure>
            </div>
            <div class='col-lg-5 mb-3'>
                <h5 class='text-uppercase'>" . htmlspecialchars($product['name']) . "</h5>
                <h2 class='fw-bold'>Rp. " . number_format($product['price'], 2) . "</h2>
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
                        <img src='img/toko.png' alt='' style='width: 80px; height: 85px' />
                    </div>
                    <div class='col-lg'>
                        <h5 class='fw-bold mb-0'>Daycomp Percetakan</h5>
                        <p class='text-secondary mt-0'>Online <span class='fw-bold'>26 Menit Lalu</span></p>
                    </div>
                    <div class='col-lg-2'>
                        <a class='btn btn-success fw-bold' href=''>Follow</a>
                    </div>
                </div>
                <hr />
            </div>
            <div class='col-lg-3'>
                <div class='card'>
                    <div class='card-body'>
                        <div class='container'>
                            <span class='fw-bold'>Atur jumlah dan catatan</span>
                            <h6 class='mb-2 fw-light mt-3'>Non bundle</h6>
                            <hr />
                            <div class='row d-flex flex-row justify-content-start align-items-baseline text-center'>
                                <div class='col-lg-5 col-5 d-flex align-items-center button-border'>
                                    <button class='button-quantity'>-</button>
                                    <input type='text' class='input-quantity w-full' style='width: 50%' />
                                    <button class='button-quantity'>+</button>
                                </div>
                                <div class='col-lg col-5 d-flex mb-3 mt-2'>
                                    <p>Stock: <span class='fw-bold'>60</span></p>
                                </div>
                            </div>
                            <div class='d-flex justify-content-between'>
                                <p class='text-secondary'>Subtotal</p>
                                <h5 class='fw-bold'>Rp. " . number_format($product['price'], 2) . "</h5>
                            </div>
                            <div class='row flex-column'>
                                <a class='col-lg btn btn-success w-full text-white fw-bold mb-2' style='color: #098a4e'>+ Keranjang</a>
                                <a class='col-lg btn btn-success w-full fw-bold mb-2' style='color: #098a4e; background-color: #fff'>Beli Langsung</a>
                            </div>
                            <div class='row justify-content-evenly'>
                                <div class='col-lg-4 col-4'>
                                    <span class='fw-bold' style='font-size: 12px'><i class='fa-solid fa-inbox'></i> Chat</span>
                                </div>
                                <div class='col-lg-4 col-4'>
                                    <span class='fw-bold' style='font-size: 12px'><i class='fa-solid fa-heart'></i> Wishlist</span>
                                </div>
                                <div class='col-lg-4 col-4'>
                                    <span class='fw-bold' style='font-size: 12px'><i class='fa-solid fa-share'></i> Share</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class='container'>
    <h2> Produk Lainnya</h2>
    <br>
    <div class='row'>";

// Fetch all products for catalog
$sql_all = "SELECT * FROM products WHERE id != $id"; // Fetch all products except the current one
$result_all = $conn->query($sql_all);

if ($result_all->num_rows > 0) {
    while($row = $result_all->fetch_assoc()) {
        echo "
        <div class='col-lg-3 mb-2'>
            <div class='card'>
                <img src='" . htmlspecialchars($row['image']) . "' class='card-img-top' alt='" . htmlspecialchars($row['name']) . "' />
                <div class='card-body'>
                    <h5 class='card-title'>" . htmlspecialchars($row['name']) . "</h5>
                    <p class='card-text'>Rp. " . number_format($row['price'], 2) . "</p>
                    <a href='detail_produk.php?id=" . $row['id'] . "' class='btn btn-primary'>Detail</a>
                </div>
            </div>
        </div>";
    }
} else {
    echo "<p>No other products found.</p>";
}
echo "
    </div> 
</div>
<br>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>";

include 'footer.php';
$conn->close();
?>