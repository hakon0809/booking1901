<?php
  session_start();
  include("config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title> Booking Ansvarlig </title>
    <link rel="stylesheet" type="text/css" href="CSS\standard.css">
    <style type="text/css"></style>
  </head>

  <body id="Site">
    <header id="header">
      <div id="inner-header">
        <div>
          <h1 id="overskrift1">WELCOME</h1>
        </div>
        <div id="menubar">
          <ul id="menu">
              <li><a> Min Side </a></li>
              <li><a href="konsertoversikt.php">Konsertoversikt</a></li>
              <li><a href="Log_In/login.php"> Log Out</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main id="Main-content">

      <?php
        $sql = "SELECT band.b_id, users.username
                FROM users INNER JOIN band
                ON band.manager_id = u_id" ;
        $result = $conn->query($sql);
        echo "<form method = 'post'>";
        echo "<select name='band_id'>";
        while ($row = $result->fetch_assoc()){
          echo "<option value=" . $row['b_id'] . ">" . $row['username'] . "</option>";
        }
        echo "</select>";
        echo "<button type='submit' name='submit' > velg </button>";
        echo "</form>";
        ?>

        <div class="registering_band_via_manager">
          <form class="band-form">
            <table>
              <tr>
                <td><label for="navn"> <h4>  Tekniskebehov fra Manager: </h4></label></td>
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
                          echo "0 behov";
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
