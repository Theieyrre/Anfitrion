<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amfitrion_db";

$db = mysqli_connect($servername, $username, $password, $dbname);

if (!$db) {
  die("Connection failed: " . mysqli_connect_errno());
} else {
  mysqli_set_charset ( $db , "utf8" );
}
?>