<?php

   //put this in its own config.php file later
   include("config.php");
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
      /*
      session_register("myusername");
      $_SESSION['login_user'] = $myusername;
      echo $myusername . "<br>";
      */
      switch ($row["role"]) {
        case 'arrangor':
            header('Location: ../Arrangor/arrangor_home.html');
            break;
        case 'tekniker':
            header('Location: ../Tekniker/tekniker_konsertoversikt.html');
            break;
        case 'manager':
            //header('Location: ../Manager/START_PAGE');
            echo "manager <br>"
            break;
        case 'bookingansvarlig':
            header('Location: ../Bookingansvarlig/bookingansvarlig.html');
            break;
        case 'bookingsjef':
            header('Location: ../Bookingsjef/bookingsjef.html');
            break;
        default:
            echo "not a valid usertype";
      }

    } else {
      $error = "Your Login Name or Password is invalid";
    }
  }
?>
