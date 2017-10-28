<?php
define('DB_SERVER', 'mysql.stud.ntnu.no');
define('DB_USERNAME', 'hkmardal_admin');
define('DB_PASSWORD', 'sommer');
define('DB_DATABASE', 'hkmardal_databasen');
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
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
$omtale = $_POST['omtale'];


$sql = "INSERT INTO tilbud (t_artist_name, t_pris, t_scene, t_dato_k, t_dato_sendt, t_tidkonsertstart, t_tidkonsertslutt, melding_til_m, mail_m, melding_til_bs, tilbud_sendt_til_bs, tilbud_sendt_til_m, omtaler)
                    VALUES ('$artist', '$pris', '$scene', '$datokonsert', '$datosend', '$konsertstart', '$konsertslutt', '$meldingm', '$mail_m', '$meldingbs', 'Ja', 'Nei', '$omtale')";
if(!mysqli_query($conn,$sql)){
  echo "Not Sent!";
} else {
  echo "Sent!";
}
header("refresh:3; url= home_booking_ansvarlig.php");
  ?>
