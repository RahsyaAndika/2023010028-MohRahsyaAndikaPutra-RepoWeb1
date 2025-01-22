<?php session_start(); ?>
<?php include 'db.php'; ?>
<?php $id = $_GET['id']; ?>
<?php $product = $conn->query("SELECT * FROM products WHERE id = $id")->fetch_assoc(); ?>
<?php $title = 'Edit Produk'; ?>
<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1>Edit Produk</h1>
    <form action="edit_product_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value="<?= $product['price'] ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" required><?= $product['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Gambar Produk (Kosongkan jika tidak ingin mengubah)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Update Produk</button>
    </form>
</div>

<?php include 'footer.php'; ?>