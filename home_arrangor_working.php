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
              <li><a href="konsertoversikt.php"> Konsertoversikt</a></li>
              <li><a href="Log_In/login.php"> Log Out</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main id="Main-content">
      <?php
        include("config.php");
          // selects conserts and scenes from the database
          $sql = "SELECT k_name, k_id FROM konsert" ;
          $result = $conn->query($sql);
          echo "<form method = 'post'>";
          echo "<select name='konserter'>";
          while ($row = $result->fetch_assoc()){
            echo "<option value=" . $row['k_id'] . ">" . $row['k_name'] . "</option>";
          }
          echo "</select>";
          echo "<button type='submit' name='submit' > hei </button>";
          echo "</form>";

          if($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "SELECT users.name, users.mobile, users.email
            FROM users INNER JOIN user_konsert
            ON users.u_id = user_konsert.user_id
            AND user_konsert.konsert_id = '$_POST[konserter]'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              echo "<table><tr>
                    <th>Name</th>
                    <th>MobileNr</th>
                    <th>Mail</th>
                    </tr>";
              while ($row = $result->fetch_assoc()) {

                echo "<tr>
                      <td>" . $row["name"]. "</td>
                      <td>" . $row["mobile"]. "</td>
                      <td>" . $row["email"]. "</td>
                      </tr>";
              }
                echo "</table>";
              } else {
                echo "0 results";
              }
            }
            $conn->close();
          ?>
    </main>

    <footer id="footer">Foot</footer>

  </body>
</html>
