<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<html>
<head>
  <title>Band Comments</title>
  <link rel = "stylesheet" href = "style.css">
</head>
  <body>
  	<center><h1>Band Comments</h1></center>

<?php

dbConnect("database_project");

$id = $_SESSION['userid'];

$sql = "SELECT * FROM band_comment";
$result = mysql_query ($sql);

if (!$result) {
	error('Error querying database.');
} else if(mysql_num_rows($result) == 0) {
	echo 'You have no favorite albums listed. If you would like to add favorite albums, please visit this <a href="albums.php">link</a>.';
} 
else {
	while ($row = mysql_fetch_array($result)){
		$band_name_result = mysql_query("SELECT * FROM band WHERE band_id = $row[band_id]");
		$band_name = mysql_result($band_name_result, 0, 'name');

		echo "Band: <i>$band_name</i><br />";

		$username_result = mysql_query("SELECT * FROM user WHERE user_id = $row[user_id]");
		$username = mysql_result($username_result, 0, 'username');

		echo "Username: <i>$username</i><br />";

		echo "Comment: $row[content]<br />";
		echo "<hr />";

		//$name = mysql_result($result2, 0, 'album_name');
		// echo "$band_name";
		// echo "<br />";


		// $year = mysql_result($result2, 0, 'year');
		// $bandid = mysql_result($result2, 0, 'band_id');
		// $bandnamequery = "SELECT name FROM band WHERE band_id = $bandid";
		// $bandresult = mysql_query($bandnamequery);
		// $band = mysql_result($bandresult, 0, 'name');
	}
}

?>
</body>
</html>

