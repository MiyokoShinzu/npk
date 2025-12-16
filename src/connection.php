
<?php
$servername = "153.92.15.84";
$username = "u148988291_npkuser"; // Change username
$password = "EVALLO21ab."; // Change password
$dbname = "u148988291_npk"; // Change database name

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>