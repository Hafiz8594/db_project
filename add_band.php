<?php
//Code to add a band to the database

//***********************************
include_once 'common.php';        //*
include_once 'db.php';            //*     
session_start();                  //*
//***********************************

//Retrieve the POST variables from the form sent
$bandID = $_POST['bandid'];
$bandName = $_POST['bandname'];
$bandInfo = $_POST['bandinfo'];
$bandYear = $_POST['bandyear'];

//Add Band to the Database
$sql = "INSERT INTO band (band_id, name, info, year) 
VALUES ('$bandID','$bandName', '$bandInfo', '$bandYear')";

$result = mysql_query($sql);

echo "Band Added!";

?>
