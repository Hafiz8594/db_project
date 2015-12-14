<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
dbConnect('database_project');

$getBandInfo = mysql_query("SELECT * FROM band WHERE name = '$_POST[name]'");
$getBandID = mysql_result($getBandInfo, 0, 'band_id');

$sql = "DELETE FROM user_band WHERE $getBandID = band_id AND $_SESSION[userid] = user_id";
$result = mysql_query($sql);

echo 'The band has been successfully removed from your favorite band list. Please click here to go back: <a href="add_delete.php">go back</a>';

if(!$result){
			error('A database error occured in processing your submission.\n' .
					'If this error persists, please contact you@example.com.');
}
?>

