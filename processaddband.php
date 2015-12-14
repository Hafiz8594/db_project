<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
dbConnect('database_project');

$getBandInfo = mysql_query("SELECT * FROM band WHERE name = '$_POST[name]'");
$getBandID = mysql_result($getBandInfo, 0, 'band_id');

$sql = "INSERT INTO user_band VALUES ('$_SESSION[userid]', '$getBandID')";
$result = mysql_query($sql);

echo 'The band has been successfully added to your favorite band list. Please click here to go back: <a href="add_delete.php">go back</a>';

if(!$result){
			error('A database error occured in processing your submission.\n' .
					'If this error persists, please contact you@example.com.');
}
?>

