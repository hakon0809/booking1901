<?php
  session_start();
  include("config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title> Bookingansvarlig </title>
    <link rel="stylesheet" type="text/css" href="CSS\standard1.css">
    <style type="text/css"></style>
    <!-- BOOTSTRAP CDN -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  </head>

  <body id="Site">
    <div>
      <h1 id="overskrift1">DAGENE</h1>
    </div>

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
                    <li><a href="Log_In/login.php"> Logg Ut</a></li>
                  </ul>

                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>

            </div>
            </div>


      <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    </header>

    <main id="Main-content">


        <script type="text/javascript" language="javascript">
        function selectChange(val) {
        //Set the value of action in action attribute of form element.
        //Submit the form
        $('#myForm').submit();
        }
        </script>

      <?php
        $sql = "SELECT band.b_id, users.name
                FROM users INNER JOIN band
                ON band.manager_id = u_id
                AND band.bans_id = '$_SESSION[user_id]'" ;
        $result = $conn->query($sql);
        echo "<form id='myForm' method = 'post'>";
        echo "<select name='band_id' onChange=selectChange(this.value)>";
        echo "<option hidden>Velg manager</option>";
        while ($row = $result->fetch_assoc()){
          echo "<option value=" . $row['b_id'] . ">" . $row['name'] . "</option>";
        }
        echo "</select>";
        echo "</form>";
        ?>

        <div class="registering_band_via_manager">
          <form class="band-form">
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

                </tr>
                <tr>
                    <td><label for="navn"> <h4> Tilbud til Manager </h4></label></td>
                </tr>
                <tr>
                    <td><label for="pris"> Pris: </label></td>
                  <td><input type="text" name="pris"/> kr,- </td>
                </tr>
                <tr>
                    <td><label for="dato"> Dato: </label></td>
                  <td><input type="text" name="dato"/></td>
                </tr>
                <tr>
                    <td><label for="starttid"> Start Tid: </label></td>
                  <td><input type="text" name="starttid"/></td>
                </tr>
                <tr>
                    <td><label for="slutttid"> Slutt Tid: </label></td>
                  <td><input type="text" name="slutttid"/></td>
                </tr>
                <tr>
                    <td></td>
                  <td><button> Send Tilbud </button></td> <!--tilbud blir sendt til Bookingsjef-->
                </tr>
              </table>
          </form>
      </div>

    </main>

    <footer id="footer">Foot</footer>

  </body>
</html>
