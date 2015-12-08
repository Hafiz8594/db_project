<?php //accesscontrol.php
include_once 'common.php';
include_once 'db.php';

session_start();

$album_id = $_POST['album_id'];



$sql = "DELETE FROM album WHERE id = '$album_id'";
$result = mysql_query($sql);


echo "Album Deleted";
?>
