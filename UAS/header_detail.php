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
        <form role='search' class='d-flex'>
            <input
                class='form-control me-2'
                type='search'
                placeholder='Search'
                aria-label='Search'
            />
            <button class='btn btn-outline-success' type='submit'>
                Search
            </button>
        </form>
        <p class='logout-button'>
            <a href='logout.php' class='btn btn-danger'>Logout</a>
        </p>
    </div>
</div>
</header>
<script src="js/script.js"></script>

</body>
</html>