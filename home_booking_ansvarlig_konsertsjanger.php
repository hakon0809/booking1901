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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

          $sql = "SELECT DISTINCT k_genre FROM konsert" ;
          $result = $conn->query($sql);
          echo "<form id='myForm' method = 'post'>";
          echo "<select name='sjanger' class='selectpicker' data-style='btn-success' onChange=selectChange(this.value)>";
          echo "<option hidden>Velg sjanger</option>";
          while ($row = $result->fetch_assoc()){
            echo "<option value=" . $row['k_genre'] . ">" . $row['k_genre'] . "</option>";
          }
          echo "</select>";
          echo "</form>";

          if($_SERVER["REQUEST_METHOD"] == "POST") {

            $sql = "SELECT  scene.s_name, konsert.k_name, konsert.date, konsert.time_start, konsert.time_end
            FROM konsert INNER JOIN scene
            ON konsert.scene_id = scene.s_id
            AND k_genre LIKE '$_POST[sjanger]'" ;

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              echo "<table class='table-striped'><tr>
                    <th>Scene</th>
                    <th>Navn</th>
                    <th>Dato</th>
                    <th>Start</th>
                    <th>Slutt</th>
                    </tr>";
              while ($row = $result->fetch_assoc()) {

                echo "<tr>
                    <td>" . $row["s_name"]. "</td>
                    <td>" . $row["k_name"]. "</td>
                    <td>" . $row["date"]. "</td>
                    <td>" . $row["time_start"]. "</td>
                    <td>" . $row["time_end"]. "</td>
                      </tr>";
              }
                echo "</table>";
              } else {
                echo "Ingen data";
              }
            }
            $conn->close();
          ?>
    </main>

    <footer id="footer">Foot</footer>

  </body>
</html>
