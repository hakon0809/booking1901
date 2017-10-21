
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
