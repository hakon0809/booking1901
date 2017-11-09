<?php
include("config.php");

$id = $_POST['tilbudid'];

$sql = "UPDATE tilbud
        SET godkjent_m = 1
        WHERE t_id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Tilbud godkjent";
    echo "</br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("refresh:3; url=../manager_home.php");
?>