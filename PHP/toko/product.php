<?php session_start(); ?>
<?php include 'db.php'; ?>
<?php $id = $_GET['id']; ?>
<?php $product = $conn->query("SELECT * FROM products WHERE id = $id")->fetch_assoc(); ?>
<?php $title = $product['name']; ?>
<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1><?= $product['name'] ?></h1>
    <img src="<?= $product['image'] ?>" class="img-fluid" alt="<?= $product['name'] ?>">
    <p><strong>Harga:</strong> <?= $product['price'] ?></p>
    <p><strong>Deskripsi:</strong> <?= $product['description'] ?></p>

    <h3>Pilih Varian</h3>
    <select class="form-control mb-3">
        <option value="varian1">Varian 1</option>
        <option value="varian2">Varian 2</option>
    </select>

    <h3>Komentar</h3>
    <form action="submit_comment.php" method="POST">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <div class="form-group">
            <textarea class="form-control" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
    </form>

    <h3>Ulasan</h3>
    <div id="comments">
        <?php
        $comments = $conn->query("SELECT * FROM comments WHERE product_id = $id");
        while ($comment = $comments->fetch_assoc()) {
            echo "<p><strong>{$comment['username']}:</strong> {$comment['comment']}</p>";
        }
        ?>
    </div>

    <a href="katalog.php" class="btn btn-secondary mt-3">Kembali ke Katalog</a>
</div>

<?php include 'footer.php'; ?>