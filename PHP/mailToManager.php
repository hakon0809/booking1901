<?php
include('newManagerUser.php');
$id = $_POST['tilbudid'];

$sql = ("SELECT mail_m, melding_til_m
            FROM tilbud
            WHERE t_id = $id");

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$msg = $row["melding_til_m"] . "\n" .
    "Nettside: http://org.ntnu.no/booking1901/ \n" .
    "Brukernavn: " . $un . "\n" .
    "Passord: " . $p;

$mail = $row["mail_m"];
$header = "Hilsen oss i Dagene!";
$sendMail = mail($mail, "Booking", $header, $msg);

if(!mysqli_query($conn,$sql, $sendMail)){
    echo "Noe gikk galt!";
} else {
    echo "Tilbud godtatt og mail sendt til manager (", $mail, ")!";
    echo "</br>";
}
?>
