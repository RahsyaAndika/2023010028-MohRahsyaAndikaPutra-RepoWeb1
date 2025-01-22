<?php include 'header.php'; ?>
<div class="container mt-4">
    <h2>Login</h2>
    <form action="login_proses.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="role">Masuk sebagai:</label>
            <select class="form-control" id="role" name="role">
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php include 'footer.php'; ?>