<?php
session_start();
include("PHP/config.php");
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title> Oversikt </title>

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
                    <span class="navbar-brand">Oversikt</span>
                  </div>

                  <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li><a href="bookingsjef_home.php"> Min side </a></li>
                      <li><a href="konsertoversikt.php">Konsertoversikt</a></li>
                      <li><a href="bookingsjef_rapport.php">Rapport</a></li>
                      <li class="active"><a href="bookingsjef_oversikt.php">Bookingoversikt <span class="sr-only">(current)</span></a></li>
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

        <h4> Oversikt: </h4>  <!-- for å finne tilbud til manager og godkjenne den -->
            <script type="text/javascript">
            function selectChange(val1) {
            //Set the value of action in action attribute of form element.
            //Submit the form
            $('#myForm').submit();}
            </script>
          <?php
          include("PHP/config.php");
          $current_concert = "Dagene " . date("Y");
            // selects conserts and scenes from the database
           $sql = "SELECT DISTINCT date FROM konsert
                  WHERE konsert.festival_name = '$current_concert'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                echo "<table class='table-striped'><tr>
                      <th>Datoer</th>
                      <th>Booking</th>
                      </tr>";
                $row = $result->fetch_assoc();
                for ($i = 1; $i <= 7; $i++){
                    $date = "0".$i.".11.".date("y");
                    if ($date == $row["date"]) {
                        echo "<tr>
                              <td>" . $row["date"]. "</td>
                              <td> booked </td>
                              </tr>";
                        $row = $result->fetch_assoc();
                    } else {
                        echo "<tr>
                              <td>" . $date . "</td>
                              <td> not booked </td>
                              </tr>";
                    }
                }
                  echo "</table>";
              }
              else {
                  echo "no data";
                }
          $sql = "SELECT * FROM tilbud";
          $result = $conn->query($sql);
          echo "<h4> Antall tilbud sendt: $result->num_rows </h4>";
              $conn->close();
          ?>
      </main>
  </body>
  </html>
