<?php
session_start();
include("config.php");
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
                    <li class="active"><a> Min Side <span class="sr-only">(current)</span> </a></li>
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
      <h4> Tilbud for Manager </h4>  <!-- for å finne tilbud til manager og godkjenne den -->
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

    <!--      <div class="registering_band_via_manager">
                <form class="band-form">
                  <table>
                    <tr>
                      <td><label for="navn"> <h1>  Tekniske behov fra band: </h1></label></td>
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
            </div> -->

      <h4> Billett Priser </h4>
        <table>
            <tr>
                <td>Scene: </td>
                <td><select id="scene">
                        <option value="0" hidden>Velg scene</option>
                        <option value="10">Scene 1 (10 plasser)</option>
                        <option value="50">Scene 2 (50 plasser)</option>
                        <option value="500">Scene 3 (500 plasser)</option>
                        <option value="4500">Scene 4 (4500 plasser)</option>
                    </select></td>
            </tr>
            <tr>
                <td>Utgifter: </td>
                <td><input type="number" id="konsertUtgifter" step="1" placeholder="0" maxlength="8"></td>
            </tr>
            <tr>
                <td>Ønsket overskudd dersom utsolgt: </td>
                <td><input type="number" id="konsertOverskudd" step="1" placeholder="0" maxlength="6"></td>
            </tr>
            <tr>
                <td><button type="button" id="beregnPrisBtn">Beregn</button></td>
                <td id="anbefaltPris"></td>
            </tr>
            <tr>
                <td>
                    Dersom 50% billettsalg:
                </td>
                <td id="50pris">

                </td>
            </tr>
            <tr>
                <td>
                    Dersom 75% billettsalg:
                </td>
                <td id="75pris">

                </td>
            </tr>
            <tr>
                <td>
                    Dersom 100% billettsalg:
                </td>
                <td id="100pris">

                </td>
            </tr>
        </table>
    </main>
<footer id="footer"> <div class="container copyright"> Dagene &copy; 2017</div> </footer>
</body>
<script type="text/javascript" src="JavaScript/prisforslag.js"></script>
</html>
