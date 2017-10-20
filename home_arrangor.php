<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Arrangør </title>

    <!-- BOOTSTRAP CDN -->

    <!-- Latest compiled and minified CSS -->             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->					                      <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <!-- To ensure proper rendering and touch zooming -->	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Lokal CSS/JS -->
    <link rel="stylesheet" type="text/css" href="CSS\standard.css">
    <style type="text/css"></style>
  </head>
  <body id="Site">
    <header id="header">
      <div id="inner-header">
        <div>
          <h1 id="overskrift1">DAGENE</h1>
        </div>
        <div id="menubar">
          <ul id="menu">
              <li><a>Min Side</a></li>
              <li><a href="konsertoversikt.php"> Konsertoversikt</a></li>
              <li><a href="Log_In/login.php"> Logg Ut</a></li>
          </ul>
        </div>
      </div>
        <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    </header>

    <main id="Main-content">

        <script type="text/javascript" language="javascript">
            function selectChange(val) {
            //Set the value of action in action attribute of form element.
            //Submit the form
            $('#myForm').submit();
            }
        </script>
        <h1>Min side</h1>


      <?php
        include("config.php");
          // selects conserts and scenes from the database
          $sql = "SELECT konsert.k_name, konsert.k_id
                  FROM konsert INNER JOIN user_konsert
                  ON user_konsert.konsert_id = konsert.k_id
                  AND user_konsert.user_id = '$_SESSION[user_id]'" ;
          $result = $conn->query($sql);
          echo "<form id='myForm' method = 'post'>";
          echo "<select name='konserter' onChange=selectChange(this.value)>";
          echo "<option hidden>Velg konsert</option>";
          while ($row = $result->fetch_assoc()){
            echo "<option value=" . $row['k_id'] . ">" . $row['k_name'] . "</option>";
          }
          echo "</select>";
          echo "</form>";

          if($_SERVER["REQUEST_METHOD"] == "POST") {

            $sql = "SELECT k_name from konsert WHERE k_id = '$_POST[konserter]'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "<h2> $row[k_name] </h2>";

            $sql = "SELECT users.name, users.mobile, users.email
            FROM users INNER JOIN user_konsert
            ON users.u_id = user_konsert.user_id
            AND user_konsert.konsert_id = '$_POST[konserter]'
            AND users.role = 'tekniker'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              echo "<table class='table-striped'><tr>
                    <th>Navn</th>
                    <th>Mobil</th>
                    <th>Mail</th>
                    </tr>";
              while ($row = $result->fetch_assoc()) {

                echo "<tr>
                      <td>" . $row["name"]. "</td>
                      <td>" . $row["mobile"]. "</td>
                      <td>" . $row["email"]. "</td>
                      </tr>";
              }
                echo "</table>";
              } else {
                echo "Ingen teknikere satt til denne konserten";
              }
            }
            $conn->close();
          ?>
    </main>

    <footer id="footer">Foot</footer>

  </body>
</html>
