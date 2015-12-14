<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<html>
<head>
  <title>My Shows</title>
  <link rel = "stylesheet" href = "style.css">
</head>
  <body>
  	<center><h1>Past and Current Performances Attended</h1></center>

<?php

dbConnect("database_project");

$id = $_SESSION['userid'];

$sql = "SELECT * FROM user_performance WHERE user_id = $id";
$result = mysql_query ($sql);

if (!$result) {
	error('Error querying database.');
} else if(mysql_num_rows($result) == 0) {
	echo'You have no favorite bands listed. If you would like to add favorite bands, please visit this <a href="bands.php">link</a>.';
} 
else {
	echo '<center>To edit your performances list, please click here: <a href="editperformances.php">EDIT PERFORMANCES ATTENDED</a><br /><br /></center>';
	echo'<center><table>
	<tr><th>Name</th><th>Date</th><th>Description</th></tr>';
	while ($row = mysql_fetch_array($result)){
		$result2 = mysql_query("SELECT * FROM performance WHERE performance_id = $row[performance_id]");
		$name = mysql_result($result2, 0, 'name');
		$date = mysql_result($result2, 0, 'date');
		$description = mysql_result($result2, 0, 'description');

		echo "<tr><td>$name</td>
		<td>$date</td>
		<td>$description</td></tr>";
	}
	?>
	</table></center><br />
	<center><button type="button" onclick="location.href='userwelcome.php'">Go Back</button>
<?php
}

?>
</body>
</html>

