
<?php
// $servername = "localhost";   
// $username = "root"; 
// $password = ""; 
// $dbname = "npk_db"; 
 $servername = "153.92.15.84";
 $username = "u148988291_npkuser";
 $password = "EVALLO21ab."; 
 $dbname = "u148988291_npk"; 

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>