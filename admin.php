<?php
  include("log_out.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Administrator </title>

    <!-- BOOTSTRAP CDN -->

    <!-- Latest compiled and minified CSS -->             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->					                      <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <!-- To ensure proper rendering and touch zooming -->	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Lokal CSS/JS -->
    <link rel="stylesheet" type="text/css" href="CSS\standard.css">
    <link rel="stylesheet" type="text/css" href="CSS\admin.css">
    <style type="text/css"></style>
  </head>



  <body id="Site">
    <header id="header">
      <div id="inner-header">
        <div id="overskrift1">
          <h1>Nettside</h1>
        </div>
        <div id="overskrift2">
          <h2></h2>
        </div>
        <div id="menubar">
          <ul id="menu">
              <li><a href="#"> Home </a></li>
              <li><a href="Log_In/login.php"> Log Out</a></li>
          </ul>
        </div>
      </div>
    </header>

<body id="Site">
    <container id="Main-content">
        <form id="addForm">
            Name:
            <input type="text" name="nameInput" id="nameInput"><br>
            Job:
            <select id="jobInput" name="job">
                <option value="arrangor">Arrangør</option>
                <option value="tekniker">Tekniker</option>
                <option value="bookingansvarlig">Bookingansvarlig</option>
                <option value="bookingsjef">Bookingsjef</option>
            </select>
        </form>
        <button onclick="function_test()" id="addBtn">Add worker</button>
        <button onclick="sortTable()" id="sortBtn">Sort table</button>

        <table id="myTable"> <!--style="width:100%"-->
            <tbody>
            <tr>
                <th>Navn</th>
                <th>???</th>
                <th>Stilling</th>
            </tr>
            <tr>
                <td>b navn</td>
                <td>?</td>
                <td>Arrangør</td>
            </tr>
            <tr>
                <td>a navn</td>
                <td>?</td>
                <td>Bookingsjef</td>
            </tr>
            <tr>
                <td>c navn</td>
                <td>?</td>
                <td>Bookingsjef</td>
            </tr>
            </tbody>
        </table>

        <p id="demo">ok</p>
        <p><button id="BTN">hehe</button></p>
    </container>
</body>
<script type="text/javascript" src="JavaScript/adminJS.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="JavaScript/jquery.js"></script>

<footer id="footer">Foot</footer>
</body>
</html>
