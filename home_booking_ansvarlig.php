<?php
  session_start();
  include("config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Bookingansvarlig </title>

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
                    <li class="active"><a href= <?php echo "home_" . $_SESSION["role"] . ".php"; ?>> Min Side <span class="sr-only">(current)</span> </a></li>
                    <li><a href="konsertoversikt.php">Konsertoversikt</a></li>
                    <li><a href="home_booking_ansvarlig_konsertsjanger.php">Tidligere konserter</a></li>
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
          <label><h4> Tilbud for Manager </h4></label>  <!-- for å finne tilbud til manager og godkjenne den -->
              <script type="text/javascript" language="javascript">
              function selectChange(val1) {
              //Set the value of action in action attribute of form element.
              //Submit the form
              $('#myForm').submit();}
              </script>

              <div id="dropdownmenu">
                  <?php
                    $sql = "SELECT band.b_id, users.name
                            FROM users INNER JOIN band
                            ON users.u_id = band.manager_id
                            AND band.bans_id = '$_SESSION[user_id]'" ;
                    $result = $conn->query($sql);
                    echo "<form id='myForm' method = 'post'>";
                    echo "<select name='band_id' onChange=selectChange(this.value)>";
                    echo "<option hidden> Velg manager </option>";
                    while ($row = $result->fetch_assoc()){
                      echo "<option value=" . $row['b_id'] . ">" . $row['name'] . "</option>";
                    }
                    echo "</select>";
                    echo "</form>";
                    ?>
                  </div>

         <div class="registering_band_via_manager">
                    <form class="band-form" >
                      <table>
                        <tr>
                          <td><label>  Tekniske behov fra band: </label></td>
                            <td>
                            <?php
                              if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                $sql = "SELECT behov FROM teknisk_behov WHERE band_id = '$_POST[band_id]'";
                                $result = $conn->query($sql);

                                //makes a table with the info
                                if ($result->num_rows > 0) {
                                  echo "<table>";
                                  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<tr><td>" . $row["behov"] . "</td></tr>";
                                  }
                                    echo "</table>";
                                  } else {
                                    echo "Ingen behov lagt inn";
                                  }
                                }
                                $conn->close();
                              ?>
                            </td>
                          </tr>
                <form action="sendtilbudBA.php" method="post">
                    <table>
                    <tr>
                    <tr>
                        <td><label> Artist: </label></td>
                        <td><input id="artist" name="artist" type="text"/></td>
                    </tr>
                    <tr>
                        <td><label> Pris: </label></td>
                      <td><input id="pris" name="pris" type="number"/> kr,- </td>
                    </tr>
                    <tr>
                        <td><label> Scene For Konserten: </label></td>
                      <td>
                          <select name="scene" id="scene">
                              <option>hihi</option>
                            <?php
                            include ("config.php");
                            $sql = "SELECT DISTINCT s_name FROM scene";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option>" . $row["s_name"] . "</option>";
                                }
                            }
                            ?>
                          </select>
                      </td>
                    </tr>
                    <tr>
                        <td><label> Dato For Konserten: </label></td>
                      <td><input id="datokonsert" name="datokonsert" type="text"/></td>
                    </tr>
                    <tr>
                        <td><label> Dato Tilbud Blir Sendt: </label></td>
                      <td><input  id="datosend" name="datosend" type="text"/></td>
                    </tr>
                    <tr>
                        <td><label> Konsert Start Tid: </label></td>
                      <td><input id="konsertstart" name="konsertstart" type="text"/></td>
                    </tr>
                    <tr>
                        <td><label> Konsert Slutt Tid: </label></td>
                      <td><input id="konsertslutt" name="konsertslutt" type="text"/></td>
                    </tr>
                    <tr>
                        <td><label> Omtale </label></td>
                        <td>
                          <textarea id="omtale" name="omtale" type="text" rows="5" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label> Lenker til Presseomtaler </label></td>
                        <td>
                          <textarea id="presseomtale" name="presseomtale" type="text" rows="5" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label> Melding til Manager </label></td>
                      <td>
                        <textarea id="meldingm" name="meldingm" type="text" rows="5" cols="40" ></textarea>
                      </td>
                    </tr>
                    <tr>
                        <td><label> Manager e-mail </label></td>
                        <td><input id="mail_m" type="email" name="mail_m"/></td>
                    </tr>
                    <tr>
                        <td><label> Melding til Bookingsjef: </label></td>
                      <td>
                        <textarea id="meldingbs" name="meldingbs" type="text"rows="5" cols="40" ></textarea>
                      </td>
                    </tr>
                        <td></td>
                      <td> <input id="btn" type="submit" name="submit" value="Send"/>
                      </td> <!--tilbud blir sendt til Bookingsjef-->
                    </tr>
                  </table>
              </form>
          </div>
            <h1>Avslåtte tilbud</h1>
            <?php
            include("config.php");
            $sql = "SELECT t_id, t_artist_name, t_pris, t_scene, t_dato_k, t_dato_sendt, t_tidkonsertstart, t_tidkonsertslutt, melding_til_m, mail_m, melding_til_bs, godkjent_bs, godkjent_m, tilbud_sendt_til_bs, tilbud_sendt_til_m, fra_bans_id
                              FROM tilbud WHERE godkjent_bs = 2
                              AND fra_bans_id = $_SESSION[user_id]
                              ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <button type='button' id='0' onclick='moreOrLess(this.id)' class='artistButton'>Artist: " . $row["t_artist_name"] . "</button>
                        <table class='tilbudText' style='display:none'>
                        <input class='o' name='tilbudid' id='tilbudid' style='display:none' value='" . $row["t_id"] . "'/>
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
                        <tr><td><label> Godkjenn Tilbud: </label><input id=\"btn\" value=\"Godkjenn\"/></td><td><input class='avslaaBtn' id=\"avslaaBtn\" value=\"Avslå tilbud\"/></td></tr><!-- onclick='setID(this.id)'-->

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
        </main>
        </body>

</html>
