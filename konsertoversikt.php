<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Konsertoversikt </title>

    <!-- BOOTSTRAP CDN -->

    <!-- Latest compiled and minified CSS -->             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->					                      <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <!-- To ensure proper rendering and touch zooming -->	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Lokal CSS/JS -->
    <link rel="stylesheet" type="text/css" href="CSS\standard.css">
    <style type="text/css">

        table, th, td {
            border: 1px solid black;
        }
        td {
            width: 100px;
            height: 1.5em;
        }
    </style>
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
                    <span class="navbar-brand">Konsertoversikt</span>
                </div>

                <!-- Henter nav linker, forms, og andre innhold for aktivering til navbaren-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href= <?php echo "home_" . $_SESSION["role"] . ".php"; ?>> Min Side </a></li><!-- må skrive en side for hver user side som vi kan linke til og for de brukerne som kan også bruke dette side-->
                        <li class="active"><a href="konsertoversikt.php"> Konsertoversikt<span class="sr-only">(current)</a></li>
                        <?php
                        switch ($_SESSION["role"]) {
                            case 'arrangor':
                                break;
                            case 'tekniker':
                                break;
                            case 'manager':
                                break;
                            case 'booking_ansvarlig':
                                echo "<li><a href='bans_tidligere_konserter.php'>Tidligere konserter</a></li>";
                                break;
                            case 'bookingsjef':
                                echo "<li><a href='bsjef_rapport.php'>Rapport</a></li>
                                  <li><a href='bsjef_oversikt.php'>Bookingoversikt</a></li>";
                                break;
                            case 'admin':
                                break;
                        }
                        ?>
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
    <h1>Tidligere konserter:</h1>
    <form>
        <button type="button" onClick="showAll()">Vis alle</button>Søk: <input type="text" id="searchField" onkeyup="nameSort()" placeholder="Søk etter en tidligere konsert">
        Sjanger:
        <select name="sjanger" id="sjanger" onchange="genreSort()">
            <option value="0">Alle sjangre</option>
            <?php
            $sql = "SELECT DISTINCT k_genre FROM konsert";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option>" . $row["k_genre"] . "</option>";
                }
            }
            ?>
        </select>
        Scene:
        <select name="scene" id="scene" onchange="sceneSort()">
            <option value="0">Alle scener</option>
            <?php
            $sql = "SELECT DISTINCT s_name FROM scene";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option>" . $row["s_name"] . "</option>";
                }
            }
            ?>
        </select>
        År:
        <select name="år" id="year" onchange="yearSort()">
            <option value="0">Alle år</option>
            <?php
            /*
            $sql = "SELECT DISTINCT konsert.date FROM konsert";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $currentDate = date("d.m.Y");

                $currentYear = substr($currentDate, -2, 2);
                $currentMonth = substr($currentDate, -7, 2);
                $currentDay = substr($currentDate, 0, 2);

                while ($row = $result->fetch_assoc()) {
                    $year = substr($row["date"], -2);

                    $month = substr($row["date"], -5, 2);
                    $day = substr($row["date"], 0, 2);

                    if ($year < $currentYear) {
                        echo "<option>$year</option>";
                    }
                }
            }
            */
            ?>
            <?php
            $sql = "SELECT DISTINCT festival_name FROM konsert";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $year = substr($row[festival_name], -2);
                    echo "<option>20$year</option>";
                }
            }
            ?>
        </select>
    </form>
    <?php
    $sql = "SELECT konsert.k_id, konsert.scene_id, konsert.k_name, konsert.k_genre, konsert.date, konsert.time_start, konsert.time_end, scene.s_name FROM konsert INNER JOIN scene ON konsert.scene_id = scene.s_id";
    $result = $conn->query($sql);

    //makes a table with the info
    if ($result->num_rows > 0) {
        echo "<table id='konsertTable'><tr>
              <th>Scene</th>
              <th>Navn</th>
              <th>Sjanger</th>
              <th>Dato</th>
              <th>Start</th>
              <th>Slutt</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {

            echo "<tr>
                <td>" . $row["s_name"]. "</td>
                <td>" . $row["k_name"]. "</td>
                <td>" . $row["k_genre"]. "</td>
                <td>" . $row["date"]. "</td>
                <td>" . $row["time_start"]. "</td>
                <td>" . $row["time_end"]. "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</main>
<footer id="footer"> <div class="container copyright"> Dagene &copy; 2017</div> </footer>
</body>
<script src="JavaScript/konsertSort.js"></script>
</html>
