<?php
session_start();
include("PHP/config.php");
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title> Bookingsjef </title>

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
                      <li><a href="konsertoversikt.php">Konsertoversikt</a></li>
                      <li><a href="bookingsjef_rapport.php">Rapport</a></li>
                      <li><a href="bookingsjef_oversikt.php">Bookingoversikt</a></li>
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
          <label id="rolle" style="position: static;float:right;background-color:#ffb3b3;">
              Innlogget som:
              <?php
              include("PHP/config.php");
              session_start();
              echo "$_SESSION[role]";
              ?>
          </label>

         <div class="registering_band_via_manager">
                    <form class="band-form" >

                        <label><h3>Tilbud mottatt for godkjenning: </h3></label><br>
                                <?php
                                include("PHP/config.php");
                                $sql = "SELECT t_id, t_artist_name, t_pris, t_scene, t_dato_k, t_dato_sendt, t_tidkonsertstart, t_tidkonsertslutt, melding_til_m, mail_m, melding_til_bs, godkjent_bs, godkjent_m, tilbud_sendt_til_bs, tilbud_sendt_til_m
                                  FROM tilbud WHERE godkjent_bs = 0
                                  ";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "
                                            <form method='post'>
                                            <button type='button' id='0' onclick='moreOrLess(this.id)' class='artistButton'>Artist: " . $row["t_artist_name"] . "</button><br>
                                            <table class='tilbudText' style='display:none'>
                                            <input class='o' name='tilbudid' id='tilbudid' style='display:none' value='" . $row["t_id"] . "'/><br>
                                            <tr><th><label>Artist: </label></th><th>" . $row["t_artist_name"] . "</th></tr>
                                            <tr><td><label> Pris: </label></td><td> " . $row["t_pris"] . ",- NOK</td></tr>
                                            <tr><td><label> Dato for konsert: </label></td><td> " . $row["t_dato_k"] . "</td></tr>
                                            <tr><td><label> Scene: </label></td><td> " . $row["t_scene"] . "</td></tr>
                                            <tr><td><label> Dato tilbud blir  sendt: </label></td><td> " . $row["t_dato_sendt"] . "</td></tr>
                                            <tr><td><label> Konsert start tid: </label></td><td> " . $row["t_tidkonsertstart"] . "</td></tr>
                                            <tr><td><label> Konsert slutt tid: </label></td><td> " . $row["t_tidkonsertslutt"] . "</td></tr>
                                            <tr><td><label> Melding til Manager: </label></td><td> " . $row["melding_til_m"] . "</td></tr>
                                            <tr><td><label> Manager e-mail: </label></td><td> " . $row["mail_m"] . "</td></tr>
                                            <tr><td><label> Melding fra Bookingansvarlig: </label></td><td> " . $row["melding_til_bs"] . "</td></tr>
                                            <tr><td><label> Godkjenn Tilbud: </label></td>
                                                <td><input id=\"btn\" formaction='PHP/godtaTilbud.php' type=\"submit\" name=\"submit\" value=\"Godkjenn\"/>
                                                    <input class='avslaaBtn' formaction='PHP/avslaaTilbud.php' id=\"avslaaBtn\" type=\"submit\" name=\"submit\" value=\"Avslå tilbud\"/></td></tr><!-- onclick='setID(this.id)'-->
                                                </td>
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
                            for(var i=0;i<=artistList.length;i++) {
                                artistList[i].id = i;
                            }

                            function moreOrLess(i) {
                                if (tekstList[i].style.display == "none") {
                                    tekstList[i].style.display = "block";
                                } else {
                                    tekstList[i].style.display = "none";
                                }
                            }

                        </script>
                  </form>
                </div>

            <h3> Billettpris Generator </h3>
            <table>
                <tr>
                    <td><label>Scene: </label></td>
                    <td>
                        <form method="post" action"">
                        <select name="scene" onchange="this.form.submit()" id="scene">
                            <option hidden>Velg scene</option>
                            <?php
                            include("PHP/config.php");
                            $sql = "SELECT DISTINCT s_name FROM scene";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option>" . $row["s_name"] . "</option>";
                                }
                            }
                            ?></select>
                        </form>
                        <label>
                            <?php
                            include("PHP/config.php");
                            $scene = $_POST['scene'];
                            $sql = "SELECT audience_size FROM scene WHERE s_name = '$scene'";
                            $plasser = $row["audience_size"];
                            echo "<script>console.log(tester + '$scene')</script>";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<label> $scene:&nbsp</label><label id='plasserLabel'>" . $row["audience_size"] . "&nbsp</label><label> plasser</label>";
                                }
                            }
                            ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><label>Utgifter: </label></td>
                    <td><input type="number" id="konsertUtgifter" step="1" placeholder="0"></td>
                </tr>
                <tr>
                    <td><label>Ønsket overskudd dersom utsolgt: </label></td>
                    <td><input type="number" id="konsertOverskudd" step="1" placeholder="0"></td>
                </tr>
                <tr>
                    <td><button type="button" id="beregnPrisBtn">Beregn</button></td>
                    <td id="anbefaltPris"></td>
                </tr>
                <tr>
                    <td><label>
                            Billettpris dersom 50% forventet billettsalg:
                        </label></td>
                    <td id="50pris">

                    </td>
                </tr>
                <tr>
                    <td><label>
                            Billettpris dersom 75% forventet billettsalg:
                        </label></td>
                    <td id="75pris">
                    </td>
                </tr>
                <tr>
                    <td><label>
                            Billettpris dersom 100% forventet billettsalg:
                        </label></td>
                    <td id="100pris">

                    </td>
                </tr>
            </table>
      </main>
        <script type="text/javascript">
            document.getElementById("anbefaltPris").innerHTML = "Velg scene!";
            document.getElementById("beregnPrisBtn").addEventListener("click", function(){
                var plasser = document.getElementById("plasserLabel").innerHTML;
                plasser = parseInt(plasser);
                if (plasser > 0) {
                    document.getElementById("anbefaltPris").innerHTML = "";

                    var nullPris = (document.getElementById("konsertUtgifter").value / plasser);

                    var onsketPris = (document.getElementById("konsertOverskudd").value / plasser) + nullPris;
                    //document.getElementById("anbefaltPris").innerHTML = "Billettpris: " + String(onsketPris) + "NOK";
                    document.getElementById("50pris").innerHTML = "Billettpris: <strong>" + String((onsketPris/0.5).toFixed(2)) + "NOK</strong>" + " = ca. " + ((parseInt((onsketPris/0.5).toFixed(2) / 10, 10) + 1) * 10) + "NOK";
                    document.getElementById("75pris").innerHTML = "Billettpris: <strong>" + String((onsketPris/0.75).toFixed(2)) + "NOK</strong>" + " = ca. " + ((parseInt((onsketPris/0.75).toFixed(2) / 10, 10) + 1) * 10) + "NOK";
                    document.getElementById("100pris").innerHTML = "Billettpris: <strong>" + String(onsketPris.toFixed(2)) + "NOK</strong>" + " = ca. " + ((parseInt(onsketPris.toFixed(2) / 10, 10) + 1) * 10) + "NOK";
                } else {
                    document.getElementById("anbefaltPris").innerHTML = "Velg en scene!";
                }
            });
        </script>
  </body>
  </html>
