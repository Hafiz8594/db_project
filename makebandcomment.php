<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<?php

if (isset($_POST['band'])) {

	echo 'HELLOO';

	$getBandInfo = mysql_query("SELECT * FROM band WHERE name = '$_POST[band]'");
	$getBandID = mysql_result($getBandInfo, 0, 'band_id');

	$sql = "INSERT INTO band_comment (content, band_id, user_id) VALUES ('$_POST[comment]', '$getBandID', '$_SESSION[userid]')";
	$result = mysql_query($sql);

}

?>

<html>
<head>
  <title>Edit Performance</title>
  <link rel = "stylesheet" href = "style.css">
  <script type="text/javascript">
		function process(form){
			var band = form.band.value;
			var comment = form.comment.value;
			if (band == null || band == "") {
		        alert("Please select a band to comment on.");
		        document.getElementById("band").focus();
		        document.getElementById("band").style.backgroundColor = "#FF6666";
		        return false;
	    	} else if(comment == null || comment == "") {
	    		alert("Please make a comment.");
		        document.getElementById("comment").focus();
		        document.getElementById("comment").style.backgroundColor = "#FF6666";
		        return false;
	    	} else {
	    		document.forms["commentForm"].submit();
	    		//alert("Comment submitted.");
	    	}
		}

	</script>
</head>
  <body>
  	<center><h1>Make a comment</h1></center>

	<br/><br />
	<form name="commentForm" id="commentForm" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
		Please select a band to comment on: 
		<?php
			dbConnect('database_project');
			$sql = "SELECT * FROM band";
			$query = mysql_query($sql);
			echo "<select name='band' id='band'>";
				echo "<option value=''>Select a band</option>";
				while($query_item = mysql_fetch_array($query)){
					echo "<option value='$query_item[name]'>".htmlspecialchars($query_item["name"])."</option>";
				}
			echo "</select>";
		?><br /><br />

		Please write your comment below:<br />
		<textarea name="comment" id="comment"></textarea><br /><br />
		<input type="submit" value="Submit" onclick="return process(this.form)">
	</form>
</body>
</html>