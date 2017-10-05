<?php include("log_out.php"); ?>

<html>
  <head>
    <meta charset="utf-8">

    <title> Manager </title>
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
          <h1 id="overskrift1"> WELCOME </h1>
        </div>
        <div id="menubar">
          <ul id="menu">
              <li><a>Min Side</a></li>
              <li><a href="konsertoversikt.php">Konsertoversikt</a></li>
              <li><a href="Log_In/login.php"> Log Out</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main id="Main-content">
    <?php
      include("config.php");
      $sql = "SELECT konsert.k_id, konsert.s_id, konsert.k_name, konsert.date, konsert.time_start, konsert.time_end, scene.s_name FROM konsert INNER JOIN scene ON konsert.s_id = scene.s_id";
      $result = $conn->query($sql);

      //makes a table with the info
      if ($result->num_rows > 0) {
        echo "<table><tr>
              <th>Scene</th>
              <th>Name</th>
              <th>Date</th>
              <th>Start</th>
              <th>End</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {

          echo "<tr>
                <td>" . $row["s_name"]. "</td>
                <td>" . $row["k_name"]. "</td>
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
  </body>
</html>
