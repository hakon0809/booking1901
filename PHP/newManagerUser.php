<?php
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



$id = $_POST['tilbudid'];
$sql2 = ("SELECT mail_m
            FROM tilbud
            WHERE t_id = $id");

$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$mail = $row2["mail_m"];



$sql = "INSERT INTO users (username, password, role, email)
                    VALUES ('$un', '$p', 'manager', '$mail')";
if ($conn->query($sql) === TRUE) {
  echo "Ny manager bruker laget!";
  echo "</br";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
