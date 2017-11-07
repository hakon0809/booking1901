<?php
$mail_m = $_POST['mail_m'];

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
if ($conn->query($sql) === TRUE) {
  echo "Ny manager bruker laget!";
  echo "</br";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
