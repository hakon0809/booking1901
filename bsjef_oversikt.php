<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Oversikt </title>

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
                    <li><a href= <?php echo "home_" . $_SESSION["role"] . ".php"; ?>> Min Side </a></li>
                    <li><a href="konsertoversikt.php">Konsert Oversikt</a></li>
                    <li class="active"><a href="bsjef_oversikt.php">Bookingoversikt <span class="sr-only">(current)</span></a></li>
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
      <label><h4> Oversikt: </h4></label>  <!-- for å finne tilbud til manager og godkjenne den -->
          <script type="text/javascript" language="javascript">
          function selectChange(val1) {
          //Set the value of action in action attribute of form element.
          //Submit the form
          $('#myForm').submit();}
          </script>
        <?php
        include("config.php");
        $current_concert = "dagene " . date("y");
          // selects conserts and scenes from the database
         $sql = "SELECT DISTINCT date FROM konsert 
                WHERE konsert.festival_name = '$current_concert'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              echo "<table class='table-striped'><tr>
                    <th>Datoer booket</th>
                    </tr>";
              while ($row = $result->fetch_assoc()) {

                echo "<tr>
                      <td>" . $row["date"]. "</td>
                      </tr>";
              }
                echo "</table>";
            }
            else {
                echo "no data";
              }
        $sql = "SELECT * FROM tilbud";
        $result = $conn->query($sql);
        $num_rows = 2;
        echo "Antall tilbud sendt: $num_rows"; 

        
            $conn->close(); 
        ?>
        

        
    </main>
</body>
</html>