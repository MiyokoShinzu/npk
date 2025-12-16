<?php
session_start();
include 'src/connection.php';

$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if (
		empty($_POST['username']) ||
		empty($_POST['email']) ||
		empty($_POST['password'])
	) {
		$error_message = "All fields are required.";
	} else {

		$username = trim($_POST['username']);
		$email    = trim($_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$check = $mysqli->prepare("SELECT id FROM accounts WHERE username = ?");
		$check->bind_param("s", $username);
		$check->execute();
		$check->store_result();

		if ($check->num_rows > 0) {
			$error_message = "Username already exists.";
		} else {
			$stmt = $mysqli->prepare(
				"INSERT INTO accounts (username, email, password) VALUES (?, ?, ?)"
			);
			$stmt->bind_param("sss", $username, $email, $password);

			if ($stmt->execute()) {
				$success_message = "Registration successful! Redirecting to login...";
				header("Refresh:2; url=index.php");
			} else {
				$error_message = "Registration failed. Please try again.";
			}
			$stmt->close();
		}
		$check->close();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Register | SYSTEM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		body {
			min-height: 100vh;
			background:
				linear-gradient(rgba(4, 142, 80, 0.85),
					rgba(25, 135, 84, 0.85)),
				url("assets/bg-farm.jpg");
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
		}

		.register-card {
			border-radius: 18px;
			box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
			background: rgba(255, 255, 255, 0.96);
			backdrop-filter: blur(6px);
		}

		.form-control {
			border-radius: 8px;
		}

		.btn-primary {
			border-radius: 8px;
			padding: 12px;
		}
	</style>
</head>

<body>

	<div class="container min-vh-100 d-flex justify-content-center align-items-center">
		<div class="row w-100 justify-content-center">

			<!-- CENTERED CARD -->
			<div class="col-md-8 col-lg-6 col-xl-5">
				<div class="card register-card p-5">

					<h2 class="fw-bold text-center mb-3">Create Account</h2>
					<p class="text-muted text-center mb-4">
						Register to access the System
					</p>

					<!-- ALERTS -->
					<?php if ($success_message): ?>
						<div class="alert alert-success text-center">
							<?= htmlspecialchars($success_message) ?>
						</div>
					<?php elseif ($error_message): ?>
						<div class="alert alert-danger text-center">
							<?= htmlspecialchars($error_message) ?>
						</div>
					<?php endif; ?>

					<form method="post" autocomplete="off">

						<div class="mb-3">
							<label class="form-label fw-semibold">Username</label>
							<input type="text" name="username" class="form-control form-control-lg" required>
						</div>

						<div class="mb-3">
							<label class="form-label fw-semibold">Email</label>
							<input type="email" name="email" class="form-control form-control-lg" required>
						</div>

						<div class="mb-4">
							<label class="form-label fw-semibold">Password</label>
							<input type="password" name="password" class="form-control form-control-lg" required>
						</div>

						<div class="d-grid">
							<button class="btn btn-primary btn-lg">
								Register
							</button>
						</div>

						<p class="text-center small mt-3">
							Already have an account?
							<a href="index.php" class="fw-semibold text-decoration-none">
								Login
							</a>
						</p>

					</form>

				</div>
			</div>

		</div>
	</div>

</body>

</html>