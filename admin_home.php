<?php
session_start();
include("PHP/config.php");
?>

<!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
        <title> Administrator </title>

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
                            <span class="navbar-brand">Forside</span>
                        </div>

                        <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a> Min Side <span class="sr-only">(current)</span> </a></li>
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
            <h4>Legg til bruker</h4>
              <form action="PHP/leggTilBruker.php" method="post">
                  <input name="navn" placeholder="Navn">
                  <input name="brukernavn" placeholder="Brukernavn">
                  <input name="passord" placeholder="Passord">
                  <input name="email" type="email" placeholder="E-mail">
                  <input name="mobilnr" placeholder="Mobilnummer">
                  <input name="adresse" placeholder="Adresse">
                  <br><br>
                  <select name="rolle">
                      <option value="0">Velg role</option>
                      <?php
                      $sql = "SELECT DISTINCT role FROM users";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<option>" . $row["role"] . "</option>";
                          }
                      }
                      ?>
                  </select>
                  <button type="submit">Legg til bruker</button>
              </form>
            <br>

            <h4>Slett bruker med id: </h4>
              <form action="PHP/slettBruker.php" method="post"><select name="brukerId">
                          <option value="0">Velg id</option>
                          <?php
                          $sql = "SELECT DISTINCT u_id FROM users";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                  echo "<option>" . $row["u_id"] . "</option>";
                              }
                          }
                          ?>
                      </select>
                      <button type="submit">Slett</button>
                  </form>
                  <br>

              <?php
              $sql = "SELECT u_id, username, role, email, mobile, name, adress
                                    FROM users";
              $result = $conn->query($sql);
              echo "<table id='myAdminTable'>";
              echo "<tr><th>id</th><th>Navn</th><th>Brukernavn</th><th>Rolle</th><th>email</th><th>Mobilnummer</th><th>Adresse</th>";
              while ($row = $result->fetch_assoc()){
                  echo "<tr>";
                  echo "<td>". $row['u_id'] ."</td><td>". $row['name'] ."</td><td>". $row['username'] ."</td><td>". $row['role'] ."</td><td>". $row['email'] ."</td><td>". $row['mobile'] ."</td><td>". $row['adress'] ."</td>";
                  echo "</tr>";
              }
              echo "</table>";
              $conn->close();
              ?>
        </main>
    </body>
  </html>
