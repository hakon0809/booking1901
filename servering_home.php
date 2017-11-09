<?php
session_start();
include("PHP/config.php");
?>

<!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
        <title> Servering </title>

        <!-- BOOTSTRAP CDN -->

        <!-- Latest compiled and minified CSS -->             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->					                      <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
        <!-- To ensure proper rendering and touch zooming -->	<meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Lokal CSS/JS -->
        <link rel="stylesheet" type="text/css" href="CSS/standard.css">
        <style type="text/css">

            table, th, td {
                border: 1px solid black;
            }
            td {
                width: 100px;
                height: 1.5em;
            }
        </style>
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
                          <span class="navbar-brand"> Forside</span>
                      </div>

                      <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                              <li class="active"><a href= <?php echo $_SESSION["role"] . "_home.php"; ?>> Min Side <span class="sr-only">(current)</span></a></li>
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

          <h1>Konserter</h1>
          <?php
          $current_concert = "Dagene " . date("Y");
          $sql = "SELECT konsert.k_id, konsert.scene_id, konsert.k_name, konsert.k_genre, konsert.date, konsert.time_start, konsert.time_end, scene.s_name, konsert.salgstall
                  FROM konsert INNER JOIN scene
                  ON  scene.s_id = konsert.scene_id
                  AND konsert.festival_name = '$current_concert'";
          $result = $conn->query($sql);

          //makes a table with the info
          if ($result->num_rows > 0) {
              echo "<table><tr>
                    <th>Scene</th>
                    <th>Band</th>
                    <th>Sjanger</th>
                    <th>Dato</th>
                    <th>Start</th>
                    <th>Slutt</th>
                    <th>Publikumstall</th>
                    </tr>";
              while ($row = $result->fetch_assoc()) {

                  echo "<tr>
                      <td>" . $row["s_name"]. "</td>
                      <td>" . $row["k_name"]. "</td>
                      <td>" . $row["k_genre"]. "</td>
                      <td>" . $row["date"]. "</td>
                      <td>" . $row["time_start"]. "</td>
                      <td>" . $row["time_end"]. "</td>
                      <td>" . $row["salgstall"]. "</td>
                      </tr>";
              }
              echo "</table>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?>
      </main>
    </body>
  </html>
