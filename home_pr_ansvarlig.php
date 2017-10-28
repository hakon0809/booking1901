<?php
  session_start();
  include("config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> PR Ansvarlig </title>

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
                  <span class="navbar-brand">Forside</span>
                </div>

                <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href= <?php echo "home_" . $_SESSION["role"] . ".php"; ?>> Min Side <span class="sr-only">(current)</span> </a></li>
                    <li><a href="konsertoversikt.php">Konsert Oversikt</a></li>
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
      <div>
        <form>
              <?php
              include("config.php");
              $sql = "SELECT t_id, t_artist_name, t_pris, t_scene, t_dato_k,  t_tidkonsertstart, t_tidkonsertslutt, mail_m
                FROM tilbud WHERE godkjent_bs = 2 ";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo "
                          <form method='post'>
                          <button type='button' id='0' onclick='moreOrLess(this.id)' class='artistButton'>Artist: " . $row["t_artist_name"] . "</button>
                          <table class='tilbudText' style='display:none'>
                          <input class='o' name='tilbudid' id='tilbudid' style='display:none' value='" . $row["t_id"] . "'/>
                          <tr><th><label>Artist: </label></th><th>" . $row["t_artist_name"] . "</th></tr>
                          <tr><td><label> Pris: </label></td><td> " . $row["t_pris"] . ",- NOK</td></tr>
                          <tr><td><label> Dato for konsert: </label></td><td> " . $row["t_dato_k"] . "</td></tr>
                          <tr><td><label> Scene: </label></td><td> " . $row["t_scene"] . "</td></tr>
                          <tr><td><label> Konsert start tid: </label></td><td> " . $row["t_tidkonsertstart"] . "</td></tr>
                          <tr><td><label> Konsert slutt tid: </label></td><td> " . $row["t_tidkonsertslutt"] . "</td></tr>
                          <tr><td><label> Manager e-mail: </label></td><td> " . $row["mail_m"] . "</td></tr>
                          </table><br>
                          </form>";
                  }
              } else {
                  echo "Ingen konserter";
              }
              $conn->close();
              ?>
            <script>
              var artistList = document.getElementsByClassName("artistButton");
              var tekstList = document.getElementsByClassName("tilbudText");
              /*
              var avslaaList = document.getElementsByClassName("o");
              var avslaaBtnList = document.getElementsByClassName("avslaaBtn");
              */

              for(var i=0;i<=artistList.length;i++) {
                  artistList[i].id = i;
                  //tekstList[i].id = "0" + i;
                  //avslaaBtnList[i].id = i;

              }

              function moreOrLess(i) {
                  if (tekstList[i].style.display == "none") {
                      tekstList[i].style.display = "block";
                  } else {
                      tekstList[i].style.display = "none";
                  }
              }

              /*
              function setID(i) {
                  avslaaList[i].id = "tilbudid";
              }
              */
            </script>
        </form>
      </div>
    </main>
    </body>
</html>
