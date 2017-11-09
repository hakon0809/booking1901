<?php
  session_start();
  include("../PHP/config.php");

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    //username and password is sent from form with POST method
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $sql = "SELECT u_id, role, email FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
      $_SESSION["user_id"] = $row["u_id"];
      $_SESSION["role"] = $row["role"];
      $_SESSION["mail"] = $row["email"];
      header('Location: ../' . $row["role"] . '_home.php');
      
    } else {
      $error = "Feil brukernavn eller passord";
    }
  }
  $conn->close()
?>
