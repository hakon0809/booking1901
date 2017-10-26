<?php
  session_start();
  include("config.php");
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Konsert Sjanger </title>

    <!-- BOOTSTRAP CDN -->

    <!-- Latest compiled and minified CSS -->             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->					                      <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <!-- To ensure proper rendering and touch zooming -->	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Lokal CSS/JS -->
    <link rel="stylesheet" type="text/css" href="CSS\standard.css">
    <style type="text/css"></style>
  </head>

  <body>
    <h1 id="overskrift1">Dagene</h1>
    <div class="container top-container">
        <!-- Header -->
        <div class="page-header">
            <!-- Meny-stripe hentet fra bootstrap tutorials -->
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand og veksle blir gruppert for bedre utsikt for mobil utstilling -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <span class="navbar-brand">Sjanger</span>
                </div>

                <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a> Min Side </a></li>
                    <li ><a href="konsertoversikt.php"> Konsert Oversikt</a></li>
                    <li class="active"><a>Sjanger<span class="sr-only">(current)</span></a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="Log_In/login.php"> Logg Ut</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
          </div>
        </div>

    <main id="Main-content">

        <script type="text/javascript" language="javascript">
            function selectChange(val) {
            //Set the value of action in action attribute of form element.
            //Submit the form
            $('#myForm').submit();
            }
        </script>
        <h4>Sjanger</h4>

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
            $current_concert = "dagene " . date("y");
            $sql = "SELECT  scene.s_name, konsert.festival_name, konsert.k_name, konsert.date, konsert.time_start, konsert.time_end
            FROM konsert INNER JOIN scene
            ON konsert.scene_id = scene.s_id
            AND k_genre LIKE '$_POST[sjanger]'
            AND NOT konsert.festival_name = '$current_concert'" ;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              echo "<table class='table-striped'><tr>
                    <th>Festival</th>
                    <th>Scene</th>
                    <th>Navn</th>
                    <th>Dato</th>
                    <th>Start</th>
                    <th>Slutt</th>
                    </tr>";
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["festival_name"]. "</td>
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
    <footer id="footer"> <div class="container copyright"> Dagene &copy; 2017</div> </footer>
    </body>
</html>
