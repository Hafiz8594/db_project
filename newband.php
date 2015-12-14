<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<?php

if (isset($_POST['bandname'])) {
	dbConnect('database_project');

	//Retrieve the POST variables from the form sent
	$bandName = $_POST['bandname'];
	$bandInfo = $_POST['bandinfo'];
	$bandYear = $_POST['bandyear'];
	//Add Band to the Database
	$sql = "INSERT INTO band (name, info, year) 
	VALUES ('$bandName', '$bandInfo', '$bandYear')";
	$result = mysql_query($sql);
}

?>

<html>
<head>
  <title>Create Band</title>
  <link rel = "stylesheet" href = "style.css">
  <script type="text/javascript">
		function process(form){
			var bandname = form.bandname.value;
			var bandinfo = form.bandinfo.value;
			var bandyear = form.bandyear.value;

			if(bandname == null || bandname == "") {
	    		alert("Please enter a band name.");
		        document.getElementById("bandname").focus();
		        document.getElementById("bandname").style.backgroundColor = "#FF6666";
		        return false;
	    	} else if (bandyear == null || bandyear == "") {
	    		alert("Please enter a band year");
		        document.getElementById("bandyear").focus();
		        document.getElementById("bandyear").style.backgroundColor = "#FF6666";
	    	}
	    	else {
	    		document.forms["form"].submit();
	    		alert("The band has been successfully added to the database.");
	    	}
		}
	</script>
</head>
  <body>

  <form name="form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
	<fieldset>
		<legend>Create New Band</legend>
		
		<center>	
		<br>
		Band Name: <input type="text" id="bandname" name="bandname">
		<br>		
		Info: <input type="text" id="bandinfo" name="bandinfo">
		<br>		
		Year of Formation: <input type="text" id="bandyear" name="bandyear">
		<br>	
		
		<input style="width: 200px; height: 60px; font-size: 18; font-style: bold;" type="submit" onclick="return process(this.form)" name="createband"value="Create Band">
		</center>
	</fieldset>
  </form>
  <center><button onClick = "location.href='userwelcome.php'" style="width: 200px; height: 60px" type="button">Home</button></center>

  </body>

</html>