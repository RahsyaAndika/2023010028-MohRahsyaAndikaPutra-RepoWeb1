<?php include 'header.php'; ?>
<div class="container mt-4">
    <h2>Chat Penjual</h2>
    <div class="chat-box">
        <!-- Chat messages will be displayed here -->
        <div class="message customer">
            <strong>Customer:</strong> Halo, apakah produk ini masih tersedia?
        </div>
        <div class="message admin">
            <strong>Admin:</strong> Ya, produk tersebut masih tersedia. 
        </div>
        <!-- Form untuk mengirim pesan -->
        <form action="send_pesan.php" method="POST">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="message" placeholder="Tulis pesan..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>