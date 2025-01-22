<? include 'header_login.php'; ?>
<?php
session_start();
$servername = "localhost"; // Change if necessary
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "user_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Query to find the user based on email and role
    $sql = "SELECT * FROM users WHERE role='$role'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['full_name'] = $row['full_name'];
            $_SESSION['role'] = $row['role'];

            // Redirect to home page or admin dashboard based on role
            if ($row['role'] === 'admin') {
                header("Location: admin_home.php"); // Redirect to admin dashboard
            } else {
                header("Location: home.php"); // Redirect to user home page
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <?php include 'header_login.php'; ?>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 mx-auto mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold fs-2">Masuk</h5>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Nama Lengkap</label>
                                <input type="text" name="full_name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="role">Masuk sebagai:</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="customer">Customer</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Password</label>
                                <input type="password" name="password" class="form-control" required />
                            </div>
                            <button type="submit" class="btn btn-success w-full">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>