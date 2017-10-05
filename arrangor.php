<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>A clean template</title>
    <link rel="stylesheet" type="text/css" href="CSS\standard.css">
    <style type="text/css">


    </style>

  </head>

  <body id="Site">
    <header id="header">
      <div id="inner-header">
        <div>
          <h1 id="overskrift1">WELCOME</h1>
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
            // selects conserts and scenes from the database
            $sql = "SELECT name FROM konsert ;
            $result = $conn->query($sql);

            echo "<select name="konsert1">";
            while ($row) = mysql_fetch_array($result)){
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>" }            }
            //makes a table with the info

            $conn->close();
        ?>




    </main>

    <footer id="footer">Foot</footer>

  </body>
</html>
