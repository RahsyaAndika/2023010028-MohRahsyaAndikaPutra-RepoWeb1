<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Daycomp Percetakan</title>
</head>
<body>
<header class=' shadow'>
<div class='container'>
    <div class='logo'>
        <img src='img/toko.png' alt='Logo' class='mr-2' style='height: 100px;'>
        <a href='home.php' style='text-decoration: none;'>
            <h1>Daycomp Percetakan</h1>
        </a>
    </div>
    <div class='search-container'>
            <form class="d-flex" role="search" action="search.php" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Cari produk" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
        <p class='logout-button'>
            <a href='logout.php' class='btn btn-danger'>Logout</a>
        </p>
    </div>
</div>
<div class='container mt-5 text-center'>
    <ul class='nav nav-tabs' id='myTab' role='tablist'>
        <li class='nav-item' role='presentation'>
            <button
                class='nav-link active fw-bold'
                id='home-tab'
                data-bs-toggle='tab'
                data-bs-target='#home-tab-pane'
                type='button'
                role='tab'
                aria-controls='home-tab-pane'
                aria-selected='true'
            >
                <a href="#home">Home</a>
            </button>
        </li>
        <li class='nav-item' role='presentation'>
            <button
                class='nav-link fw-bold'
                id='about-tab'
                data-bs-toggle='tab'
                data-bs-target='#about-tab-pane'
                type='button'
                role='tab'
                aria-controls='about-tab-pane'
                aria-selected='false'
            >
                <a href="#bestseller">Terlaris</a>
            </button>
        </li>
        <li class='nav-item' role='presentation'>
            <button
                class='nav-link fw-bold'
                id='skill-tab'
                data-bs-toggle='tab'
                data-bs-target='#skill-tab-pane'
                type='button'
                role='tab'
                aria-controls='skill-tab-pane'
                aria-selected='false'
            >
            <a href="#semuaproduk">Semua Produk</a>
            </button>
        </li>
        <li class='nav-item' role='presentation'>
            <button
                class='nav-link fw-bold'
                id='project-tab'
                data-bs-toggle='tab'
                data-bs-target='#project-tab-pane'
                type='button'
                role='tab'
                aria-controls='project-tab-pane'
                aria-selected='false'
            >
                <a href="#about">About</a>
            </button>
        </li>
    </ul>
</div>
</header>
<script src="js/script.js"></script>

</body>
</html>