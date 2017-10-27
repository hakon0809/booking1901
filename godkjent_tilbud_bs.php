<?php
define('DB_SERVER', 'mysql.stud.ntnu.no');
define('DB_USERNAME', 'hkmardal_admin');
define('DB_PASSWORD', 'sommer');
define('DB_DATABASE', 'hkmardal_databasen');
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$godkjenn = $_POST['submit'];

$sql = "INSERT INTO tilbud (godkjent_bs) VALUES ('Godkjent')";
if(!mysqli_query($conn,$sql)){
  echo "Not Sent!";
} else {
  echo "Sent!";
}
header("refresh:1; url= home_bookingsjef.php");
  ?>
