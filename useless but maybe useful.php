
<!DOCTYPE HTML>
<html>
<head>
<style>
</style>
</head>
<body>

<?php
$comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo $comment;
?>

</body>
</html>

<?php
define('DB_SERVER', 'mysql.stud.ntnu.no');
define('DB_USERNAME', 'hkmardal_admin');
define('DB_PASSWORD', 'sommer');
define('DB_DATABASE', 'hkmardal_databasen');
$conn = new mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
if (!mysqli_select_db($conn,'hkmardal_databasen') {
   echo "Database not connected!";
}
$tekniskebehov = $_POST['tb'];
$sql = "INSERT INTO teknisk_behov (behov) VALUES ('$tekniskebehov')";
if(!mysqli_query($conn,$sql)){
  echo "Not Sent!";
} else {
  echo "Sent!"
}
header("refresh:3; url= home_manager.php");
  ?>

  <?php
  include('config.php')
  $tekniskebehov = $_POST['tb'];
  if(isset($_POST['submit'])){
  $sql = "INSERT INTO teknisk_behov (behov) VALUES ('$tekniskebehov')";
  $result = mysqli_query($sql);
  header("refresh:3; url= home_manager.php");
  ?>


  rows="5" cols="40" ></textarea
