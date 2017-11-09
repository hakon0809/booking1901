<?php
  session_start();
  include("PHP/config.php");
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
                        <li class="active"><a href= <?php echo "home_" . $_SESSION["role"] . ".php"; ?>> Min side <span class="sr-only">(current)</span> </a></li>
                        <li><a href="pr_ansvarlig_konsertoversikt.php">Konsertoversikt</a></li>
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

          <div>
            <h4> Oversikt av nye Konserter </h4>
            <form>
                  <?php
                  include("PHP/config.php");
                  $sql = "SELECT t_id, t_artist_name,  t_scene, t_dato_k,  t_tidkonsertstart, t_tidkonsertslutt, omtaler, presseomtaler, mail_m, salgstall
                    FROM tilbud WHERE godkjent_bs = 1 ";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "
                              <input class='o' name='tilbudid' style='display:none' value='" . $row["t_id"] . "'/>
                              <button type='button' onclick='moreOrLess(this.id)' class='artistButton'>Artist:  " . $row["t_artist_name"] . "</button><br><br>
                              <table class='tilbudText' style='display:none'>
                              <tr><th><label>Artist: </label></th><th>" . $row["t_artist_name"] . "</th></tr>
                              <tr><td><label> Dato for konsert: </label></td><td> " . $row["t_dato_k"] . "</td></tr>
                              <tr><td><label> Scene: </label></td><td> " . $row["t_scene"] . "</td></tr>
                              <tr><td><label> Konsert start tid: </label></td><td> " . $row["t_tidkonsertstart"] . "</td></tr>
                              <tr><td><label> Konsert slutt tid: </label></td><td> " . $row["t_tidkonsertslutt"] . "</td></tr>
                              <tr><td><label> Omtale av band: </label></td><td> " . $row["omtaler"] . "</td></tr>
                              <tr><td><label> Salgstall: </label></td><td> " . $row["salgstall"] . "</td></tr>
                              <tr><td><label> Lenker til presseomtaler: </label></td><td> " . $row["presseomtaler"] . "</td></tr>
                              <tr><td><label> Manager e-mail: </label></td><td> " . $row["mail_m"] . "</td></tr>
                              </table><br>";
                      }
                  } else {
                      echo "Ingen konserter";
                  }
                  $conn->close();
                  ?>
                <script>
                  var artistList = document.getElementsByClassName("artistButton");
                  var tekstList = document.getElementsByClassName("tilbudText");

                  for(var i=0;i<=artistList.length;i++) {
                      artistList[i].id = i;
                  }

                  function moreOrLess(i) {
                      if (tekstList[i].style.display == "none") {
                          tekstList[i].style.display = "block";
                      } else {
                          tekstList[i].style.display = "none";
                      }
                  }</script>
            </form>
          </div>
        </main>
      </body>
  </html>
