<?php
include("config.php");
$id = $_POST['tilbudid'];

$sql = ("UPDATE tilbud
        SET godkjent_bs = 2
        WHERE t_id = '$id'");

if(!mysqli_query($conn,$sql)){
    echo "$id" ,"Noe gikk galt!";
} else {
    echo "Tilbud avslått!";
    echo $sql;
}
header("refresh:10; url= home_bookingsjef.php");
?>
