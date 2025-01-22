<?php include 'header.php'; ?>
<div class="container mt-4">
    <h2>Daftar Akun</h2>
    <form action="register_proses.php" method="POST">
    <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
<?php include 'footer.php'; ?>