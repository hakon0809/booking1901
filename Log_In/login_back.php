<?php
  include("../config.php");
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    //username and password is sent from form with POST method
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $sql = "SELECT id, role FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {

      switch ($row["role"]) {
        case 'arrangor':
            header('Location: ../home.html');
            break;
        case 'tekniker':
            header('Location: ../home.html');
            break;
        case 'manager':
            echo "manager <br>";
            //header('Location: ../Manager/START_PAGE');
            break;
        case 'bookingansvarlig':
            echo "bookingansvarlig";
            //header('Location: ../Bookingansvarlig/bookingansvarlig.html');
            break;
        case 'bookingsjef':
            echo "bookingsjef";
            //header('Location: ../bookingsjef.html');
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
?>
