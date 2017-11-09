<?php
define('DB_SERVER', 'mysql.stud.ntnu.no');
define('DB_USERNAME', 'hkmardal_admin');
define('DB_PASSWORD', 'sommer');
define('DB_DATABASE', 'hkmardal_databasen');
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$tekniskebehov = $_POST['tekniskbehov'];
$sql = "INSERT INTO teknisk_behov (behov) VALUES ('$tekniskebehov')";
if(!mysqli_query($conn,$sql)){
  echo "Not Sent!";
} else {
  echo "Sent!";
}
header("refresh:3; url= ../manager_home.php");
  ?>
