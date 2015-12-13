<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<html>
<head>
  <title>My Albums</title>
  <link rel = "stylesheet" href = "style.css">
</head>
  <body>
  	<center><h1>My Favorite Albums</h1></center>

<?php

dbConnect("database_project");

$id = $_SESSION['userid'];

$sql = "SELECT * FROM user_album WHERE user_id = $id";
$result = mysql_query ($sql);

if (!$result) {
	error('Error querying database.');
} else if(mysql_num_rows($result) == 0) {
	echo'You have no favorite albums listed. If you would like to add favorite albums, please visit this <a href="albums.php">link</a>.';
} 
else {
	echo'<center><table>
	<tr><th>Album Name</th><th>Year</th><th>Band</th></tr>';
	while ($row = mysql_fetch_array($result)){
		$result2 = mysql_query("SELECT * FROM album WHERE album_id = $row[album_id]");
		$name = mysql_result($result2, 0, 'album_name');
		$year = mysql_result($result2, 0, 'year');
		$bandid = mysql_result($result2, 0, 'band_id');
		$bandnamequery = "SELECT name FROM band WHERE band_id = $bandid";
		$bandresult = mysql_query($bandnamequery);
		$band = mysql_result($bandresult, 0, 'name');

		echo "<tr><td>$name</td>
		<td>$year</td>
		<td>$band</td></tr>";
	}
	echo '</table></center><br />';
	echo'<center><button type="button" onclick="window.history.back()">Go Back</button>	';
	echo'<button type="button" onclick="window.location(performances.php)">Edit Favorite Albums</button></center>';
}

?>
</body>
</html>

