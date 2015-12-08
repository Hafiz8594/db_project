<?php //accesscontrol.php
include_once 'common.php';
include_once 'db.php';

session_start();

$album_name = $_POST['album_name'];
$year = $_POST['year'];
$band_id = $_POST['band_id'];


$sql = "INSERT INTO album (album_name, year,) 
VALUES ('$album_name','$year')";
$result = mysql_query($sql);



echo "Album Added";
?>
