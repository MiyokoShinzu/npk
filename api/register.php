<?php
include '../src/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $username = $_GET['username'];
  $email = $_GET['email'];
  $password = password_hash($_GET['password1'], PASSWORD_DEFAULT);
  $sql = "Insert into accounts(username, email, password) values('$username', '$email', '$password')";
  $result = $mysqli->query($sql);
  if ($result) {
    echo json_encode(['success' => '1']);
  } else {
    echo json_encode(['success' => '0']);
  }
  $mysqli->close();
}
?>
