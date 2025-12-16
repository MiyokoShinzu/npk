<?php
session_start();

// Include database configuration file  
include 'src/connection.php';

$success_message = '';
$error_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['username'], $_POST['password']) || empty($_POST['username']) || empty($_POST['password'])) {
        $error_message = 'Please fill both the username and password fields!';
    } else {
        if ($stmt = $mysqli->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $password_hash);
                $stmt->fetch();
                if (password_verify($_POST['password'], $password_hash)) {
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['username'];
                    $_SESSION['id'] = $id;
                    $success_message = 'Welcome ' . htmlspecialchars($_SESSION['name']) . '!';
                    header('Refresh: 2; URL=home.php'); 
                } else {
                    $error_message = 'Incorrect password!';
                }
            } else {
                $error_message = 'Username not found!';
            }

            $stmt->close();
        } else {
            $error_message = 'Database error!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Portable NPK Analyzer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .alert {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            margin-bottom: 1rem;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100 d-flex align-items-center justify-content-center">
            <div class="col-lg-12">

            </div>
            <div class="col-12 col-sm-8 col-md-5 col-lg-6">
                <div class="login-card text-center">
                    <img src="assets/lgu_logo.png"  style="max-height: 150px; max-width: 300px;" class="mb-4" alt="LGU Gonzaga Logo">
                    <h4 class="text-center text-secondary">PORTABLE NPK ANALYZER</h4>

                    <!-- Display success or error messages -->
                    <?php if (!empty($success_message)): ?>
                        <div class="alert alert-success"><?php echo $success_message; ?></div>
                    <?php elseif (!empty($error_message)): ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>

                    <form action="" method="post">
                        <div class="mb-3 text-start">
                            <label for="username" class="form-label fw-bold">Username</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Enter username" id="username" name="username" required>
                        </div>

                        <div class="mb-4 text-start">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Enter password" id="password" name="password" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Login</button>
                        </div>

                        <p class="small fw-bold mt-3 mb-0">Don't have an account? <a href="register.php" class="text-primary">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeo8XK5RrCsa8Jq7k3qhhEYpGELyYzRZ3g6jIW3"
        crossorigin="anonymous"></script>
</body>

</html>