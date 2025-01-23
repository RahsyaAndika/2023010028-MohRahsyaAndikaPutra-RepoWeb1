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
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO users (email, full_name, password, role) VALUES ('$email', '$full_name', '$password1', 'customer')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to home page after successful registration
        $_SESSION['full_name'] =  $full_name;
        $_SESSION['role'] =  'customer';
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <?php include 'header_login.php'; ?> 
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 mx-auto mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold fs-2">Daftar</h5>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Email</label>
                                <input type="email" name="email" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Nama Lengkap</label>
                                <input type="text" name="full_name" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Password</label>
                                <input type="password" name="password" class="form-control" required />
                            </div>
                            <button type="submit" class="btn btn-success">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>