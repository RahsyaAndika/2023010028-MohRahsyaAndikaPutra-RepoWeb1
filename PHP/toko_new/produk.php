<?php include 'header.php'; ?>
<div class="container mt-4">
    <h2>Daftar Produk</h2>
    <div class="row">
        <?php // Loop untuk menampilkan produk ?>
        <div class="col-md-2">
            <div class="card">
                <img src="produk1.jpg" class="card-img-top" alt="Produk 1">
                <div class="card-body">
                    <a href="detail_produk.php?id=1">
                    <h5 class="card-title">Nama Produk</h5>
                    <p class="card-text">Rp. 100.000</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- Tambahkan produk lainnya -->
    </div>
</div>
<?php include 'footer.php'; ?>