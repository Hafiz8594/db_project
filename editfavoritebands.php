<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<html>
<head>
  <title>Edit Favorite Bands</title>
  <link rel = "stylesheet" href = "style.css">
</head>
  <body>
  	<center><h1>Edit Favorite Bands</h1></center>

<?php

dbConnect("database_project");

$id = $_SESSION['userid'];

$sql = "SELECT * FROM band";
$result = mysql_query ($sql);

if (!$result) {
	error('Error querying database.');
} else if(mysql_num_rows($result) == 0) {
	echo 'There are no comments about bands listed in the database.';
} 
else {
	echo '<center>Bands are listed below. Please press button in the right column to add/delete from your favorite bands list.<br /><br /></center>';
	echo'<center><table><tr><th>Band Name</th><th>Year</th><th>Info</th><th>Albums</th><th>Performances</th></tr>';
	while ($row = mysql_fetch_array($result)){
		echo "<tr>";
		$bandname = "$row[name]";
		echo "<td>$bandname</td>";

		$year = "$row[year]";
		echo "<td>$year</td>";

		$info = "$row[info]";
		echo "<td>$info</td>";

		//$getAlbums = "SELECT * FROM albums WHERE band_id = $row[band_id]";
		$getAlbumsResult = mysql_query("SELECT * FROM album WHERE band_id = $row[band_id]");
		echo "<td>";
		while ($getAlbumsRow = mysql_fetch_array($getAlbumsResult)){
			echo "$getAlbumsRow[album_name]($getAlbumsRow[year]), ";
		}
		echo "</td>";

		$getPerformancesResult = mysql_query("SELECT * FROM band_performance WHERE band_id = $row[band_id]");
		echo "<td>";
		while ($getPerformancesRow = mysql_fetch_array($getPerformancesResult)){
			$getPerformanceInfoResult = mysql_query("SELECT * FROM performance WHERE $getPerformancesRow[performance_id] = performance_id");
			$performanceName = mysql_result($getPerformanceInfoResult,0,'name');
			$performanceDate = mysql_result($getPerformanceInfoResult,0,'date');
			echo "$performanceName ($performanceDate), ";
		}
		echo "</td>";



		echo "</tr>";
		




		// echo "Band: <i>$band_name</i><br />";

		// $username_result = mysql_query("SELECT * FROM user WHERE user_id = $row[user_id]");
		// $username = mysql_result($username_result, 0, 'username');

		// echo "Username: <i>$username</i><br />";

		// echo "Comment: $row[content]<br />";
		// echo "<hr />";
	}
	echo "</table>";
	echo '<br /><center><button type="button" onclick="window.history.back()">Go Back</button></center>';
}

?>
</body>
</html>

