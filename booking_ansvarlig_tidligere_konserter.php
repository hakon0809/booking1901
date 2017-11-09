<?php
  session_start();
  include("PHP/config.php");
?>


<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title> Tidligere konserter </title>

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
                    <span class="navbar-brand">Tidligere konserter</span>
                  </div>

                  <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li><a href= <?php echo $_SESSION["role"] . "_home.php"; ?>> Min side </a></li>
                      <li ><a href="konsertoversikt.php"> Konsertoversikt</a></li>
                      <li><a href="booking_ansvarlig_bandinfo.php"> Band Info </a></li>
                      <li class="active"><a href="home_booking_ansvarlig_konsertsjanger.php">Tidligere konserter<span class="sr-only">(current)</span></a></li>
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
                echo "$_SESSION[role]";
                ?>
            </label>

            <h2>Tidligere konserter:</h2>
            <form>
                <button id="btn" type="button" onClick="showAll()">Vis alle</button><br>
                <div id="spacing">
                  <label> Søk: </label> <input type="text" id="searchField" onkeyup="nameSort()" placeholder="Søk etter en konsert">
                </div>
                <div>
                  Sjanger:
                  <select name="sjanger" id="sjanger" onchange="genreSort()">
                      <option value="0">Alle sjangre</option>
                      <?php
                      $sql = "SELECT DISTINCT k_genre FROM konsert";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<option>" . $row["k_genre"] . "</option>";
                          }
                      }
                      ?>
                  </select>
                    Scene:
                  <select name="scene" id="scene" onchange="sceneSort()">
                      <option value="0">Alle scener</option>
                      <?php
                      $sql = "SELECT DISTINCT s_name FROM scene";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<option>" . $row["s_name"] . "</option>";
                          }
                      }
                      ?>
                  </select>
                  År:
                  <select name="år" id="year" onchange="yearSort()">
                      <option value="0">Alle år</option>
                      <?php
                      $sql = "SELECT DISTINCT festival_name FROM konsert";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              $year = substr($row[festival_name], -2);
                              echo "<option>20$year</option>";
                          }
                      }
                      ?>
                  </select>
                </div>
            </form>
            <br>
              <?php
              $current_concert = "Dagene " . date("Y");
              $sql = "SELECT konsert.k_id, konsert.scene_id, konsert.k_name, konsert.k_genre, konsert.date, konsert.time_start, konsert.time_end, scene.s_name, publikum_antall, kostnad, economic_result
              FROM konsert INNER JOIN scene
              ON konsert.scene_id = scene.s_id
              AND NOT konsert.festival_name = '$current_concert'";
              $result = $conn->query($sql);

              //makes a table with the info
              if ($result->num_rows > 0) {
                  echo "<table id='konsertTable'><tr>
                    <th>Scene</th>
                    <th>Navn</th>
                    <th>Sjanger</th>
                    <th>Dato</th>
                    <th>Start</th>
                    <th>Slutt</th>
                    <th>Antall publikum</th>
                    <th>Total kostnad</th>
                    <th>Økonomisk resultat</th>
                    </tr>";
                  while ($row = $result->fetch_assoc()) {

                      echo "<tr>
                      <td>" . $row["s_name"]. "</td>
                      <td>" . $row["k_name"]. "</td>
                      <td>" . $row["k_genre"]. "</td>
                      <td>" . $row["date"]. "</td>
                      <td>" . $row["time_start"]. "</td>
                      <td>" . $row["time_end"]. "</td>
                      <td>" . $row["publikum_antall"]. "</td>
                      <td>" . $row["kostnad"]. "</td>
                      <td>" . $row["economic_result"]. "</td>
                      </tr>";
                  }
                  echo "</table>";
              } else {
                  echo "0 results";
              }
              $conn->close();
              ?>
      </main>
      <script src="JavaScript/konsertSort.js"></script>
  </body>
  </html>
