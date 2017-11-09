<?php
include("config.php");
include ('mailToManager.php');

$id = $_POST['tilbudid'];

$sql = "UPDATE tilbud
        SET godkjent_bs = 1
        WHERE t_id = '$id'";

if ($conn->query($sql) === TRUE) {
  echo "Tilbud godkjent";
  echo "</br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header("refresh:3; url=../bookingsjef_home.php");
?>
