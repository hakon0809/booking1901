<html>
<head>
<style>
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

<?php
  include("config.php");
  // selects conserts and scenes from the database
  $sql = "SELECT k_id, scene, name, date, time_start, time_end FROM konsert";
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
              <td>" . $row["scene"]. "</td>
              <td>" . $row["name"]. "</td>
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

</body>
</html>
