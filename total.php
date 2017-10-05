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

</body>
</html>
