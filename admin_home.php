<?php
session_start();
include("config.php");
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
    <link rel="stylesheet" type="text/css" href="CSS/standard.css">
    <link rel="stylesheet" type="text/css" href="CSS/admin.css">
    <style type="text/css"></style>
    <script type="text/javascript" src="JavaScript/adminJS.js"></script>
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
    <?php
    include("config.php");
    $sql = "SELECT u_id, username, role, email, mobile, name, adress
                FROM users";
    $result = $conn->query($sql);
    echo "<table id='myTable'>";
    echo "<tr><th>id</th><th>Navn</th><th>Brukernavn</th><th>Rolle</th><th>email</th><th>Mobilnummer</th><th>Adresse</th>";
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>". $row['u_id'] ."</td><td>". $row['name'] ."</td><td>". $row['username'] ."</td><td>". $row['role'] ."</td><td>". $row['email'] ."</td><td>". $row['mobile'] ."</td><td>". $row['adress'] ."</td>";
        echo "</tr>";
    }
    echo "</table>";
    $conn->close();
    ?>
</main>

<!-- <main id="Main-content">
   <h4> BrukerE </h4>
       <form id="addForm">
         <div id="name ">
           Name:  <input type="text" name="nameInput" id="nameInput"><br>
         </div>
         <div id="job">
           Job:
             <select id="jobInput" name="job">
                 <option value="arrangor">Arrangør</option>
                 <option value="tekniker">Tekniker</option>
                 <option value="bookingansvarlig">Bookingansvarlig</option>
                 <option value="bookingsjef">Bookingsjef</option>
                 <option value="pr_ansvarlig">PR Ansvarlig</option>

             </select>
         </div>
       </form>

     <div id="btns">
       <button onclick="function_test()" id="addBtn">Lage Bruker</button>
       <button onclick="sortTable()" id="sortBtn">Sorter table</button>
     </div>-->

<!--<div id="btn"
  <p id="demo">ok</p>
  <p><button id="BTN">hehe</button></p>
</div>-->
</main>

</body>
<!--<footer id="footer"> <div class="container copyright"> Dagene &copy; 2017</div> </footer>-->
</html>