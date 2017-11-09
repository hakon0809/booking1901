<?php
include('config.php');
session_start();

$navn = $_POST['navn'];
$brukernavn = $_POST['brukernavn'];
$passord = $_POST['passord'];
$rolle = $_POST['rolle'];
$email = $_POST['email'];
$mobilnr = $_POST['mobilnr'];
$adresse = $_POST['adresse'];

$sql = "INSERT INTO users (username, password, role, email, mobile, name, adress)
          VALUES ('$brukernavn', '$passord', '$rolle', '$email', '$mobilnr', '$navn', '$adresse')";
if ($conn->query($sql) === TRUE) {
    echo "New user created!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("refresh:3; url=../admin_home.php");
?>