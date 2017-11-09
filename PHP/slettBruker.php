<?php
include('config.php');
session_start();

$brukerid = $_POST['brukerId'];

$sql = "Delete FROM users WHERE u_id = '$brukerid'";
if ($conn->query($sql) === TRUE) {
    echo "User deleted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("refresh:3; url=../admin_home.php");
?>