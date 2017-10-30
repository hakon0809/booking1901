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

$sql = ("SELECT mail_m, melding_til_m
            FROM tilbud
            WHERE t_id = $id");

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$msg = $row["melding_til_m"];
$mail = $row["mail_m"];
$header = "hilsen dagen hehe";
$sendMail = mail($mail, "Booking", $header, $msg);

if(!mysqli_query($conn,$sql, $sendMail)){
    echo "Noe gikk galt!";
} else {
    echo "Tilbud godtatt og mail sendt til manager (", $mail, ")!";
}
//header("refresh:1; url= home_bookingsjef.php");
?>
