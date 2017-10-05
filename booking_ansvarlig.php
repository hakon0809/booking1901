<?php
  include("log_out.php");
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
      <div class="registering_band_via_manager">
          <form class="band-form">
            <table>
              <tr>
                    <td><label for="navn"> <h4>  Tekniskebehov fra Manager: </h4></label></td>
                      <td> <!--the data from the database is gonna be displayed here from the technical spefications-->    </td>
                </tr>
                <tr>
                    <td><label for="navn"> <h4> Tilbud for Manager </h4></label></td>
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
