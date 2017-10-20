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

<body id="Site">
<header id="header">
    <div id="inner-header">
        <div>
            <h1 id="overskrift1">DAGENE</h1>
        </div>
        <div id="menubar">
            <ul id="menu">
                <li><a> Min Side </a></li>
                <li><a href="konsertoversikt.php">Konsertoversikt</a></li>
                <li><a href="Log_In/login.php"> Logg Ut</a></li>
            </ul>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
</header>

<main id="Main-content">
    <table>
        <tr>
            <td>Scene: </td>
            <td><select id="scene">
                    <option value="0" hidden>Velg scene</option>
                    <option value="10">Scene1 (10 plasser)</option>
                    <option value="50">Scene2 (50 plasser)</option>
                    <option value="500">Scene3 (500 plasser)</option>
                    <option value="4500">Scene4 (4500 plasser)</option>
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

<footer id="footer">Foot</footer>

</body>
<script type="text/javascript" src="JavaScript/prisforslag.js"></script>
</html>
