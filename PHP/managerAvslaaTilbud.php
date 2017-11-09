<?php
include("config.php");
$id = $_POST['tilbudid'];

$sql = ("UPDATE tilbud
        SET godkjent_m = 2
        WHERE t_id = '$id'");

if(!mysqli_query($conn,$sql)){
    echo "$id" ,"Noe gikk galt!";
} else {
    echo "Tilbud avslått!";
}
header("refresh:3; url= ../manager_home.php");
?>
