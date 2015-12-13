<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<html>
<head>
  <title>Performance Comments</title>
  <link rel = "stylesheet" href = "style.css">
</head>
  <body>
  	<center><h1>Performance Comments</h1></center>

<?php

dbConnect("database_project");

$id = $_SESSION['userid'];

$sql = "SELECT * FROM performance_comment";
$result = mysql_query ($sql);

if (!$result) {
	error('Error querying database.');
} else if(mysql_num_rows($result) == 0) {
	echo 'There are no comments about performances listed. To make a comment, please click here: <a href="makeperformancecomment.php">ADD COMMENT</a><br /><br />';
	echo'<center><button type="button" onclick="window.history.back()">Go Back</button></center>';
} 
else {
	echo 'To add a comment, please click here: <a href="makebandcomment.php">ADD COMMENT</a><br /><br />';
	while ($row = mysql_fetch_array($result)){
		$performance_name_result = mysql_query("SELECT * FROM performance WHERE performance_id = $row[performance_id]");
		$performance_name = mysql_result($band_name_result, 0, 'name');

		echo "Performance: <i>$performance_name</i><br />";

		$username_result = mysql_query("SELECT * FROM user WHERE user_id = $row[user_id]");
		$username = mysql_result($username_result, 0, 'username');

		echo "Username: <i>$username</i><br />";

		echo "Comment: $row[content]<br />";
		echo "<hr />";
	}
	echo'<center><button type="button" onclick="window.history.back()">Go Back</button></center>';
}

?>
</body>
</html>

