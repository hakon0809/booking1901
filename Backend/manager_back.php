<?php
  include("../config.php");

  $sql = "INSERT INTO teknisk_behov (behov, band_id)
          VALUES ('$_POST[teknisk_behov]', 1)";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  header("refresh:3; url = ../home_manager.php")
?>
