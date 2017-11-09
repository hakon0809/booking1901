<?php
  session_start();
  include("PHP/config.php");
?>


<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title> Rapport </title>

      <!-- BOOTSTRAP CDN -->

      <!-- Latest compiled and minified CSS -->             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- jQuery library -->					                      <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
      <!-- To ensure proper rendering and touch zooming -->	<meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Lokal CSS/JS -->
      <link rel="stylesheet" type="text/css" href="CSS/standard.css">
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
                      <span class="navbar-brand">Rapport</span>
                    </div>

                    <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li><a href ="bookingsjef_home.php"> Min side </a></li>
                        <li ><a href="konsertoversikt.php"> Konsertoversikt</a></li>
                        <li class="active"><a href="bookingsjef_rapport.php">Rapport<span class="sr-only">(current)</span></a></li>
                        <li><a href="bookingsjef_oversikt.php">Bookingoversikt</a></li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="Log_In/login.php"> Logg ut</a></li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
              </div>
            </div>

        <main id="Main-content">
            <label id="rolle" style="position: static;float:right;background-color:#ffb3b3;">
                Innlogget som:
                <?php
                include("PHP/config.php");
                session_start();
                echo "$_SESSION[role]";
                ?>
            </label>

            <script type="text/javascript">
                function selectChange(val) {
                //Set the value of action in action attribute of form element.
                //Submit the form
                $('#myForm').submit();
                }
            </script>
            <h4>Scene</h4>

          <?php
            include("PHP/config.php");
              // selects conserts and scenes from the database

              $sql = "SELECT s_id, s_name FROM scene" ;
              $result = $conn->query($sql);
              echo "<form id='myForm' method = 'post'>";
              echo "<select name='scene' class='selectpicker' data-style='btn-success' onChange=selectChange(this.value)>";
              echo "<option hidden>Velg scene</option>";
              while ($row = $result->fetch_assoc()){
                echo "<option value=" . $row['s_id'] . ">" . $row['s_name'] . "</option>";
              }
              echo "</select>";
              echo "</form>";

              if($_SERVER["REQUEST_METHOD"] == "POST") {
                $sql = "SELECT k_name, publikum_antall, kostnad, economic_result
                        FROM konsert WHERE scene_id = '$_POST[scene]'";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  echo "<br><table class='table-striped'><tr>
                        <th>Navn</th>
                        <th>Publikum</th>
                        <th>Kostnader</th>
                        <th>Økonomisk Restultat</th>
                        </tr>";
                  while ($row = $result->fetch_assoc()) {

                    echo "<tr>
                        <td>" . $row["k_name"]. "</td>
                        <td>" . $row["publikum_antall"]. "</td>
                        <td>" . $row["kostnad"]. "</td>
                        <td>" . $row["economic_result"]. "</td>
                          </tr>";
                  }
                    echo "</table>";
                  } else {
                    echo "<br> Ingen data";
                  }
                }
                $conn->close();
              ?>
        </main>
      </body>
  </html>
