<?php session_start(); ?>
<?php $title = 'Admin - Kelola Produk'; ?>
<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container mt-5">
    <h1>Kelola Produk</h1>
    <a href="tambah_product.php" class="btn btn-success mb-3">Tambah Produk</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td>
                        <a href="edit_product.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="hapus_product.php" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>