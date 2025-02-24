<?php
session_start();
if (!isset($_SESSION['full_name']) || !isset($_SESSION['role'])) {
    header("Location: register.php");
    exit();
}

$fullName = $_SESSION['full_name']; // Default to 'User  ' if full name is not set

include "db.php";

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
    <br><br><br><br><br>
    <div class='hero-header'>
        <div class='container my-5 py-5>
            <div class='row align-items-center g-5'>
                <div class='col-lg text-center text-lg-start mt-lg-5 mt-2 mb-5'>
                    <h1 id='home' class='display-3 animated slideInLeft'>Selamat Datang Customer di <span>Daycomp Percetakan!</h1>
                    <p class='animated slideInLeft mb-5 mt-5 pb-2'>Hello, <span> " . htmlspecialchars($fullName) . "! </span></p>
                </div>
            </div>
        </div>
    </div>
    
        <section class='certification' id='bestseller'>
            <h1 style='color: white'>Ter<span style='color: rgb(94, 234, 212)'>laris</span></h1>
            <div class='container-certificate'>
                <div class='field-certificate' onclick='showImage(\"overlay-1\")'>
                    <img src='img/undangan.jpeg' alt='' class='img-certificate'>
                    <i class='fa-solid fa-eye fa-xl icon-eye'></i>
                </div>
                <div class='overlay-image-certificate' id='overlay-1' style='display: none;'>
                    <div class='field-overlay-certificate'>
                        <img src='img/undangan.jpeg' alt='' class='img-certificate'>
                        <button onclick='closeImage(\"overlay-1\")'>Close</button>
                    </div>
                </div>
                <div class='field-certificate' onclick='showImage(\"overlay-2\")'>
                    <img src='img/banner.png' alt='' class='img-certificate'>
                    <i class='fa-solid fa-eye fa-xl icon-eye'></i>
                </div>
                <div class='overlay-image-certificate' id='overlay-2' style='display: none;'>
                    <div class='field-overlay-certificate'>
                        <img src='img/banner.png' alt='' class='img-certificate'>
                        <button onclick='closeImage(\"overlay-2\")'>Close</button>
                    </div>
                </div>
                <div class='field-certificate' onclick='showImage(\"overlay-3\")'>
                    <img src='img/umbul.jpg' alt='' class='img-certificate'>
                    <i class='fa-solid fa-eye fa-xl icon-eye'></i>
                </div>
                <div class='overlay-image-certificate' id='overlay-3' style='display: none;'>
                    <div class='field-overlay-certificate'>
                        <img src='img/umbul.jpg' alt='' class='img-certificate'>
                        <button onclick='closeImage(\"overlay-3\")'>Close</button>
                    </div>
                </div>
                <div class='field-certificate' onclick='showImage(\"overlay-4\")'>
                    <img src='img/yasin.jpeg' alt='' class='img-certificate'>
                    <i class='fa-solid fa-eye fa-xl icon-eye'></i>
                </div>
                <div class='overlay-image-certificate' id='overlay-4' style='display: none;'>
                    <div class='field-overlay-certificate'>
                        <img src='img/yasin.jpeg' alt='' class='img-certificate'>
                        <button onclick='closeImage(\"overlay-4\")'>Close</button>
                    </div>
                </div>
                 <div class='field-certificate' onclick='showImage(\"overlay-5\")'>
                    <img src='img/amplop.jpeg' alt='' class='img-certificate'>
                    <i class='fa-solid fa-eye fa-xl icon-eye'></i>
                </div>
                <div class='overlay-image-certificate' id='overlay-5' style='display: none;'>
                    <div class='field-overlay-certificate'>
                        <img src='img/amplop.jpeg' alt='' class='img-certificate'>
                        <button onclick='closeImage(\"overlay-5\")'>Close</button>
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
<div class='container-fluid py-5' id='tentang-kami'>    
    <div class='container'>
        <div class='position-relative d-flex align-items-center justify-content-center mb-5'>
            <h1 class='position-absolute text-uppercase text-luxury' id='about'>Ab<span>out</span></h1>
        </div>
        <div class='row align-items-center'>
            <div class='col-lg-5'>
                <img class='img-fluid rounded w-100' src='img/about-toko.jpeg' alt='Tentang Kami'>
            </div>
            <div class='col-lg-7'>
                <h3 class='mb-4'>Tentang <span>Kami</span></h3>
                <p>
                    Daycomp Percetakan adalah penyedia layanan percetakan berkualitas tinggi yang menghadirkan berbagai solusi untuk kebutuhan cetak Anda. 
                    Dengan pengalaman bertahun-tahun, kami berdedikasi untuk menciptakan produk yang tidak hanya estetis tetapi juga fungsional dan tahan lama. 
                    Filosofi kami sederhana: percetakan bukan hanya barang, tetapi bagian dari cerita dan kehangatan bisnis Anda.
                </p>
                <p>
                    Kami percaya bahwa setiap pelanggan adalah mitra kami. Oleh karena itu, kami selalu berusaha menghadirkan produk terbaik yang disesuaikan dengan kebutuhan Anda. 
                    Dari desain minimalis hingga kompleks, Daycomp Percetakan adalah tempat di mana kreativitas bertemu dengan kualitas.
                </p>
                <div class='row mb-3'>
                    <div class='col-sm-6 py-2'><h6>Nama Perusahaan: <span class='text-info'>Daycomp Percetakan</span></h6></div>
                    <div class='col-sm-6 py-2'><h6>Berdiri Sejak Tahun: <span class='text-info'>2012</span></h6></div>
                    <div class='col-sm-6 py-2'><h6>Lokasi: <span class='text-info'>Jl. srabi kidul Getassrabi, Gebog, Kudus, Jawa Tengah</span></h6></div>
                    <div class='col-sm-6 py-2'><h6>Email: <span class='text-info'>daycomp@gmail.com</span></h6></div>
                    <div class='col-sm-6 py-2'><h6>Nomor HP: <span class='text-info'>+62 859-7455-9988</span></h6></div>
                </div>
            </div>
        </div>
    </div>
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
    <script>
    function showImage(id) {
        document.getElementById(id).style.display = 'flex';
        setTimeout(() => {
            document.getElementById(id).style.transform = 'scale(1)';
        }, 10);
    }

    function closeImage(id) {
        document.getElementById(id).style.transform = 'scale(0)';
        setTimeout(() => {
            document.getElementById(id).style.display = 'none';
        }, 300); // Waktu yang sama dengan transisi CSS
    }
</script>
    ";

// Menyertakan footer.php
include 'footer.php';

echo "</body>
</html>";
?>