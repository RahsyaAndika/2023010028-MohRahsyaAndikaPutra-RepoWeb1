<?php session_start(); ?>
<?php $title = 'Katalog Produk'; ?>
<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container mt-5">
    <h1>Katalog Produk</h1>
    <form action="katalog.php" method="GET" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Cari produk...">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    <div class="row">
        <?php
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $result = $conn->query("SELECT * FROM products WHERE name LIKE '%$search%'");
        while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name'] ?></h5>
                        <p class="card-text">Harga: <?= $row['price'] ?></p>
                        <a href="product.php?id=<?= $row['id'] ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'footer.php'; ?>