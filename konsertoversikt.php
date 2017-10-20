<?php
  session_start();
  include("config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Konsertoversikt </title>

    <!-- BOOTSTRAP CDN -->

    <!-- Latest compiled and minified CSS -->             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->					                      <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <!-- To ensure proper rendering and touch zooming -->	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Lokal CSS/JS -->
    <link rel="stylesheet" type="text/css" href="CSS\standard.css">
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
                  <span class="navbar-brand">Konsert Oversikt</span>
                </div>

                <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a> Min Side </a></li> <!-- må skrive en side for hver user side som vi kan linke til og for de brukerne som kan også bruke dette side-->
                    <li class="active"><a href="konsertoversikt.php"> Konsert Oversikt<span class="sr-only">(current)</a></li>
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
    <?php
      $sql = "SELECT konsert.k_id, konsert.scene_id, konsert.k_name, konsert.date, konsert.time_start, konsert.time_end, scene.s_name FROM konsert INNER JOIN scene ON konsert.scene_id = scene.s_id";
      $result = $conn->query($sql);

      //makes a table with the info
      if ($result->num_rows > 0) {
        echo "<table><tr>
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
        echo "0 results";
      }
      $conn->close();
    ?>
  </main>
  <footer id="footer"> <div class="container copyright"> Dagene &copy; 2017</div> </footer>
  </body>
</html>
