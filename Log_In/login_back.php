<?php
  session_start();
  include("../config.php");

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    //username and password is sent from form with POST method
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $sql = "SELECT u_id, role FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
      $_SESSION["user_id"] = $row["u_id"];
      $_SESSION["role"] = $row["role"];
      switch ($row["role"]) {
        case 'arrangor':
            header('Location: ../home.html');
            break;
        case 'tekniker':
            header('Location: ../home_tekniker.php');
            break;
        case 'manager':
            header('Location: ../Manager/manager.php');
            break;
        case 'bookingansvarlig':
            header('Location: ../booking_ansvarlig.php');
            break;
        case 'bookingsjef':
            header('Location: ../home.html');
            break;
        case 'admin':
            header('location: ../admin.php');
            break;
        default:
            echo "not a valid usertype";
      }

    } else {
      $error = "Your Login Name or Password is invalid";
    }
  }
  $conn->close()
?>
