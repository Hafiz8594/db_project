<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<html>
<head>
  <title>Welcome</title>
  <link rel = "stylesheet" href = "style.css">
</head>
  <body>
  	<center><h1>My Favorite Bands</h1></center>

<?php

dbConnect("database_project");

$id = $_SESSION['userid'];

$sql = "SELECT * FROM user_band WHERE user_id = $id";
$result = mysql_query ($sql);

if (!$result) {
	error('Error querying database.');
} else if(mysql_num_rows($result) == 0) {
	echo '<center>';
	echo'You have no favorite bands listed. If you would like to add favorite bands, please click here: <a href="editfavoritebands.php">EDIT FAVORITE BANDS</a><br /><br />.';
	echo'</center>';
} 
else {
	echo '<center>To edit your favorite bands, please click here: <a href="editfavoritebands.php">EDIT FAVORITE BANDS</a><br /><br /></center>';
	echo'<center><table>
	<tr><th>Name</th><th>Info</th><th>Year</th></tr>';
	while ($row = mysql_fetch_array($result)){
		$result2 = mysql_query("SELECT * FROM band WHERE band_id = $row[band_id]");
		$name = mysql_result($result2, 0, 'name');
		$info = mysql_result($result2, 0, 'info');
		$year = mysql_result($result2, 0, 'year');

		echo "<tr><td>$name</td>
		<td>$info</td>
		<td>$year</td></tr>";
	}
	?>
	</table></center><br />
	<center><button type="button" onclick="location.href='userwelcome.php'">Go Back</button>
<?php
}

?>
</body>
</html>

