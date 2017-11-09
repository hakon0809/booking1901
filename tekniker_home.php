<?php
  session_start();
  include("PHP/config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Tekniker </title>

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
              height: 1.5em;}
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
                  <span class="navbar-brand">Forside</span>
                </div>

                <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="active"><a> Min side <span class="sr-only">(current)</span> </a></li>
                    <li><a href="konsertoversikt.php">Konsertoversikt</a></li>
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

      <h1>Mine konserter</h1>
      <?php
        include("PHP/config.php");
        $sql = "SELECT scene.s_name, konsert.k_name, konsert.date, konsert.time_start, konsert.time_end
                FROM konsert INNER JOIN user_konsert
                ON konsert.k_id = user_konsert.konsert_id
                AND user_konsert.user_id = '$_SESSION[user_id]'
                INNER JOIN scene
                ON scene.s_id = konsert.scene_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["k_name"] . "</h2>
                  <ul>
                    <li><strong>Dato: " . $row["date"] . " </strong></li>
                    <li><strong>Klokka: " . $row["time_start"] . "-" . $row["time_end"] . " </strong></li>
                    <li><strong>Scene: " . $row["s_name"] . " </strong></li>
                  </ul>";
          }
        } else {
          echo "Ingen konserter";
        }
        $conn->close();
      ?>
    </main>
    </body>
</html>
