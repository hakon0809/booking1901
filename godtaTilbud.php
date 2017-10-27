<?php
define('DB_SERVER', 'mysql.stud.ntnu.no');
define('DB_USERNAME', 'hkmardal_admin');
define('DB_PASSWORD', 'sommer');
define('DB_DATABASE', 'hkmardal_databasen');
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
$artist = $_POST['artist'];
$pris = $_POST['pris'];
$scene = $_POST['scene'];
$datokonsert = $_POST['datokonsert'];
$datosend = $_POST['datosend'];
$konsertstart = $_POST['konsertstart'];
$konsertslutt = $_POST['konsertslutt'];
$meldingm = $_POST['meldingm'];
$mail_m = $_POST['mail_m'];
$meldingbs = $_POST['meldingbs'];
*/

$id = $_POST['tilbudid'];

echo "<script>console.log('o,". $id ."');</script>";

$sql = "UPDATE tilbud
        SET godkjent_bs = '1'
        WHERE t_id = $id";
//$sql ='DELETE FROM tilbud WHERE t_id = $id';



if(!mysqli_query($conn,$sql)){
    echo "$id" ,"Noe gikk galt!";
} else {
    echo "$id" ,"Tilbud godtatt!";
}
header("refresh:3; url= home_bookingsjef.php");
?>
