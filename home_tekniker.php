<?php
  session_start();
?>

<html>
  <head>
    <meta charset="utf-8">

    <title> Konsertoversikt </title>
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

  <body id="Site">
    <header id="header">
      <div id="inner-header">
        <div>
          <h1 id="overskrift1"> DAGENE </h1>
        </div>
        <div id="menubar">
          <ul id="menu">
              <li><a> Min Side </a></li>
              <li><a href="konsertoversikt.php"> Konsertoversikt</a></li>
              <li><a href="Log_In/login.php"> Logg Ut</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main id="Main-content">


      <h1>Mine konserter</h1>

      <?php
        include("config.php");
        $sql = "SELECT scene.s_name, konsert.k_name, konsert.date, konsert.time_start, konsert.time_end
                FROM konsert INNER JOIN user_konsert
                ON konsert.k_id = user_konsert.konsert_id
                AND user_konsert.user_id = '$_SESSION[user_id]'
                INNER JOIN scene
                ON scene.s_id = konsert.scene_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["k_name"] . "</h2>
                  <ul>
                    <li><strong>Dato: " . $row["date"] . " </strong></li>
                    <li><strong>Klokka: " . $row["time_start"] . "-" . $row["time_end"] . " </strong></li>
                    <li><strong>Scene: " . $row["s_name"] . " </strong></li>
                  </ul>";
          }
        } else {
          echo "Ingen konserter";
        }
        $conn->close();
      ?>
    </main>
  </body>
</html>
