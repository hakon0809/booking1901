<?php
include('config.php');
session_start();

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
$presseomtale = $_POST['presseomtale'];
$curUser = $_SESSION["user_id"];

$sql = "INSERT INTO tilbud (t_artist_name, t_pris, t_scene, t_dato_k, t_dato_sendt, t_tidkonsertstart, t_tidkonsertslutt, melding_til_m, mail_m, melding_til_bs, tilbud_sendt_til_bs, tilbud_sendt_til_m, omtaler, presseomtaler, fra_bans_id)
          VALUES ('$artist', '$pris', '$scene', '$datokonsert', '$datosend', '$konsertstart', '$konsertslutt', '$meldingm', '$mail_m', '$meldingbs', 'Ja', 'Nei', '$omtale', '$presseomtale', '$curUser' )";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("refresh:3; url=../booking_ansvarlig_home.php");
?>
