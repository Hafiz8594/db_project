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
	echo'You have no favorite bands listed. If you would like to add favorite bands, please visit this <a href="bands.php">link</a>.';
} 
else {
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
	echo '</table></center><br />';
	echo'<center><button type="button" onclick="window.history.back()">Go Back</button>	';
	echo'<button type="button" onclick="window.history.back()">Edit Favorite Bands</button></center>';
}

?>
</body>
</html>

