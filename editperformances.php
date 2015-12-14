<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<html>
<head>
  <title>Edit Performances</title>
  <link rel = "stylesheet" href = "style.css">
</head>
  <body>
  	<center><h1>Edit Performances</h1></center>

<?php
dbConnect("database_project");
$id = $_SESSION['userid'];
$sql = "SELECT * FROM performance";
$result = mysql_query ($sql);
if (!$result) {
	error('Error querying database.');
} else if(mysql_num_rows($result) == 0) {
	echo 'There are no comments about bands listed in the database.';
} 
else {
	echo '<center>Performances are listed below. Please press button in the right column to add/delete from your performances list.<br /><br /></center>';
	echo'<center><table><tr><th>Performance Name</th><th>Date</th><th>Description</th>';
	while ($row = mysql_fetch_array($result)){
		echo "<tr>";
		$bandname = "$row[name]";
		echo "<td>$bandname</td>";
		$year = "$row[date]";
		echo "<td>$year</td>";
		$info = "$row[description]";
		echo "<td>$info</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
	<br /><center><button type="button" onclick="location.href='myshows.php'">Go Back</button>
	<button type="button" onclick="location.href='add_delete_performance.php'">Add/Delete</button></center>
<?php
}
?>
</body>
</html>