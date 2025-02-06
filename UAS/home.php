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
     <!-- google font -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link
        href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700&display=swap'
        rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' />
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <br><br><br><br><br><br><br><br>
    <div class='container'>
        <h1 id='home' >Selamat Datang Customer di <span>Daycomp Percetakan!</h1>
        <p >Hello, <span> " . htmlspecialchars($fullName) . "! </span></p>
    </div>
    
        <section class='certification' id='bestseller'>
            <h1 style='color: white'>Best <span  style='color: rgb(94, 234, 212)'>Seller</span></h1>
            <div class='container-certificate'>
                <div class='field-certificate'>
                    <img src='img/undangan.jpeg' alt='' class='img-certificate' data-aos='zoom-in'>
                    <i class='fa-solid fa-eye fa-xl icon-eye'></i>
                    <div class='overlay-image-certificate'>
                        <div class='field-overlay-certificate'>
                            <i class='fa-solid fa-chevron-left fa-3x slide-before-image-certificate'></i>
                            <img src='img/undangan.jpeg' alt='' class='img-certificate' id='overlay-image-certificate-1'>
                            <i class='fa-solid fa-chevron-right fa-3x slide-after-image-certificate'></i>
                            <button>Close</button>
                        </div>
                    </div>
                </div>
                <div class='field-certificate'>
                    <img src='img/s2.png' alt='' class='img-certificate' data-aos='zoom-in'>
                    <i class='fa-solid fa-eye fa-xl icon-eye'></i>
                    <div class='overlay-image-certificate'>
                        <div class='field-overlay-certificate'>
                            <i class='fa-solid fa-chevron-left fa-3x slide-before-image-certificate'></i>
                            <img src='img/s2.png' alt='' class='img-certificate' id='overlay-image-certificate-2'>
                            <i class='fa-solid fa-chevron-right fa-3x slide-after-image-certificate'></i>
                            <button>Close</button>
                        </div>
                    </div>
                </div>
                <div class='field-certificate'>
                    <img src='img/s3.png' alt='' class='img-certificate' data-aos='zoom-in'>
                    <i class='fa-solid fa-eye fa-xl icon-eye'></i>
                    <div class='overlay-image-certificate'>
                        <div class='field-overlay-certificate'>
                            <i class='fa-solid fa-chevron-left fa-3x slide-before-image-certificate'></i>
                            <img src='img/s3.png' alt='' class='img-certificate' id='overlay-image-certificate-3'>
                            <i class='fa-solid fa-chevron-right fa-3x slide-after-image-certificate'></i>
                            <button>Close</button>
                        </div>
                    </div>
                </div>
                <div class='field-certificate'>
                    <img src='img/s4.png' alt='' class='img-certificate' data-aos='zoom-in'>
                    <i class='fa-solid fa-eye fa-xl icon-eye'></i>
                    <div class='overlay-image-certificate'>
                        <div class='field-overlay-certificate'>
                            <i class='fa-solid fa-chevron-left fa-3x slide-before-image-certificate'></i>
                            <img src='img/s4.png' alt='' class='img-certificate' id='overlay-image-certificate-4'>
                            <i class='fa-solid fa-chevron-right fa-3x slide-after-image-certificate'></i>
                            <button>Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>


     <div class='container'>
        <br>
        <h1 class='fw-bold' id='semuaproduk'>Semua <span>Produk</span></h1>
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
<br>
    <div class='container'>
        <h1 id='about' >Selamat Datang Customer di <span>Daycomp Percetakan!</h1>
    </div>
    <!-- AOS ANIMATION JAVASCRIPT -->
    <script src='https://unpkg.com/aos@2.3.1/dist/aos.js'></script>
    <!-- AOS ANIMATION JAVASCRIPT -->
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <!-- SWEET ALERT -->
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <!-- MY SCRIPT -->
    <script src='js/script.js'></script>
    ";

// Menyertakan footer.php
include 'footer.php';

echo "</body>
</html>";
?>