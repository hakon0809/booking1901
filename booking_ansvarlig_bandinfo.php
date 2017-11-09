<?php
session_start();
include("PHP/config.php");
?>

<!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
        <title> Band Info </title>

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
                          <span class="navbar-brand"> Band Info</span>
                      </div>

                      <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                              <li><a href= <?php echo $_SESSION["role"] . "_home.php"; ?>> Min side </a></li>
                              <li><a href="konsertoversikt.php"> Konsertoversikt</a></li>
                              <li class="active"><a href="booking_ansvarlig_bandinfo.php"> Band Info<span class="sr-only">(current)</span></a></li>
                              <li><a href='booking_ansvarlig_tidligere_konserter.php'>Tidligere konserter</a></li>
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

          <h1>Bands</h1>
            <?php
            $sql = "SELECT band.b_navn, band.b_genre, band.b_album_og_salgstall, band.b_popularitet, band.b_konserter_i_norge
                    FROM band";
            $result = $conn->query($sql);

            //makes a table with the info
            if ($result->num_rows > 0) {
                echo "<table><tr>
                      <th>Navn</th>
                      <th>Sjanger</th>
                      <th>Album og Salgstall</th>
                      <th>Popularitet ut av 5</th>
                      <th>Konserter i Norge</th>
                      </tr>";
                while ($row = $result->fetch_assoc()) {

                    echo "<tr>
                        <td>" . $row["b_navn"]. "</td>
                        <td>" . $row["b_genre"]. "</td>
                        <td>" . $row["b_album_og_salgstall"]. "</td>
                        <td>" . $row["b_popularitet"]. "</td>
                        <td>" . $row["b_konserter_i_norge"]. "</td>
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
