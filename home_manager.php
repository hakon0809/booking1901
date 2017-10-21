<?php
  session_start();
  include("config.php");
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
      <div class="teknisk_behov">
          <h4>Teknisk Behov</h4>

          <?php
          include("config.php");
          if(isset($_POST['submit'])){
            $tekniskbehov = $_POST['submit'];
          }
          $sql = "INSERT INTO `teknisk_behov` (`behov`, `band_id`, `tb_id`) VALUES ($tekniskbehov, '3', NULL)";
            ?>

          <form class="band-form" action="" method="post">
            <table>
                  <tr>
                    <td><label> Skriv tekniskebehov for konserten:</label></td>
                    <td>
                    <textarea id="tekniskebehov" name="tekniskebehov" type="text" rows="5" cols="40" ></textarea>
                    </td>
                  </tr>
              </table>
              <input id="btn" type="submit" name="submit" value="Send"/>

          </form>
      </div>

    <div id="tilbudmanager">
      <h4> Tilbud </h4>  <!-- for å finne tilbud fra bookingsjef og godkjenne den -->
    </div>
    </main>
    <footer id="footer"> <div class="container copyright"> Dagene &copy; 2017</div> </footer>
    </body>
</html>
