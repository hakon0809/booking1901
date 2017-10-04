<?php
  include("log_out.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title> Manager </title>
    <link rel="stylesheet" type="text/css" href="..\CSS\standard.css">
    <style type="text/css"></style>

  </head>

  <body id="Site">
    <header id="header">
      <div id="inner-header">
        <div>
          <h1 id="overskrift1"> WELCOME </h1>
        </div>
        <div id="menubar">
          <ul id="menu">
              <li><a>Min Side</a></li>
              <li><a href="konsertoversikt.html">Konsertoversikt</a></li>
              <li><a href="Log_In/login.php"> Log Out</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main id="Main-content">
      <div class="registering_band_via_manager">
          <h3></h3>
          <h3>
              Fill out for the technical spesifications for the consert:
          </h3>
          <form class="band-form">
            <table>
                  <tr>
                    <td><label for="tekniskebehov"> Technical Specification </label></td>
                  <td><textarea class="textarea-tekniskebehov"></textarea></td>
                  </tr>
                <tr>
                    <td></td>
                    <td><button>Send</button></td>
                  </tr>
              </table>
          </form>
      </div>

    </main>

    <footer id="footer">Foot</footer>

  </body>
</html>
