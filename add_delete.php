<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<html>
<head>
  <title>Edit Favorite Bands</title>
  <link rel = "stylesheet" href = "style.css">
  <script type="text/javascript">
		function processDelete(){
			document.forms["deleteband"].submit();
			//setTimeout(function () { window.location.reload(); }, 30);
			alert("The band has been succesfully removed from your favorite band list.");
		}

		function processAdd(){
			document.forms["addband"].submit();
			//setTimeout(function () { window.location.reload(); }, 30);
			alert("The band has been succesfully added to your favorite band list.");
		}

	</script>
</head>
  <body>
  	<center><h1>Edit Favorite Bands</h1></center>

	Select the band you would like to add to your favorite bands list: 
	
	<form style="display: inline;" name="addband" method="post" action="processaddband.php">
		<?php
			dbConnect('database_project');
			$sql = "SELECT DISTINCT band.name
					FROM band
					LEFT OUTER JOIN user_band
					ON band.band_id = user_band.band_id AND user_band.user_id = $_SESSION[userid]
					WHERE user_band.band_id is null";
			$query = mysql_query($sql);
			echo "<select name='name'>";
				echo "<option value=''>Select a band to add</option>";
				while($query_item = mysql_fetch_array($query)){
					echo "<option value='$query_item[name]'>".htmlspecialchars($query_item["name"])."</option>";
				}
			echo "</select>";
		?><br /><br />
		<input type="button" value="Add" onclick="processAdd()">
	</form><br/><br />

	Select the band you would like to delete from your favorite bands list:
	<form style="display: inline;" name="deleteband" method="post" action="processdeleteband.php">
		<?php
			dbConnect('database_project');
			//$sql = "SELECT name FROM band";
			$sql = "SELECT DISTINCT band.name
					FROM band
					INNER JOIN user_band
					ON user_band.user_id = $_SESSION[userid] AND band.band_id = user_band.band_id
					ORDER BY band.name";
			$query = mysql_query($sql);
			echo "<select name='name'>";
				echo "<option value=''>Select a band to delete</option>";
				while($query_item = mysql_fetch_array($query)){
					echo "<option value='$query_item[name]'>".htmlspecialchars($query_item["name"])."</option>";
				}
			echo "</select>";
		?><br /><br />
		<input type="button" value="Delete" onclick="processDelete()">
	</form>
	<br /><center><button type="button" onclick="window.history.back()">Go Back</button>

</body>
</html>