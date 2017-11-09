  <?php
    session_start();
    include("config.php");


    $sql = "INSERT INTO songs (s_oving, s_konsert, man_id)
            VALUES ('$_POST[låtero]', '$_POST[låterk]', '$_SESSION[user_id]')";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("refresh:3; url = ../manager_home.php")
  ?>
