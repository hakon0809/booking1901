<?php
  session_start();
  include("PHP/config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Manager </title>

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
                    <li class="active"><a> Min side <span class="sr-only">(current)</span> </a></li>
                    <li><a href="konsertoversikt.php">Konsertoversikt</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="Log_In/login.php"> Logg ut</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
          </div>
        </div>

    <main id="Main-content">
      <div class="teknisk_behov">
          <h4>Teknisk Behov</h4>

          <form action="Backend/manager_back.php" method="post">
            <label> Skriv tekniskebehov for konserten:</label>
            <br>
            <textarea id="teknisk_behov" name="teknisk_behov" rows="5" cols="40" ></textarea>
            <br>
            <input id="btn" type="submit" name="submit" value="Send"/>
          </form>
      </div>
    </main>
    </body>
</html>
