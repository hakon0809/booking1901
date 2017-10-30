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
*/
$mail_m = $_POST['mail_m'];
/*
$meldingbs = $_POST['meldingbs'];
$omtale = $_POST['omtale'];
*/

function createUsername($len = 10) {
    $uName = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($uName);
    return substr(implode($uName), 0, $len);
}

function createPassword($len = 10) {
    $pw = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($pw);
    return substr(implode($pw), 0, $len);
}

$un = createUserName();
$p = createPassword();

$sql = "INSERT INTO users (username, password, role, email)
                    VALUES ('$un', '$p', 'manager', '$mail_m')";
if(!mysqli_query($conn,$sql)){
    echo "Not Sent!";
} else {
    echo "Sent!";
}

?>
