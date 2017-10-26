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
          <script type="text/javascript" language="javascript">
          function selectChange(val) {
          //Set the value of action in action attribute of form element.
          //Submit the form
          $('#myForm').submit();
          }
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
              <form>
                <table>
                  <tr>
                    <td><label for="navn"> <h4>  Tekniske behov fra band: </h4></label></td>
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
                </form>
                <form action="sendtilbudBA.php" method="post">
                    </tr>
                    <label for="navn"> <h4> Tilbud til Manager </h4></label>
                    <
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
                      <td><input id="scene" name="scene" type="text"/></td>
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
        </main>
        </body>

</html>
