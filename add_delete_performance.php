<?php
include_once 'common.php';
include_once 'db.php';
include_once 'accesscontrol.php';
?>

<?php

if (isset($_POST['add'])) {

	$getPerformanceInfo = mysql_query("SELECT * FROM performance WHERE name = '$_POST[add]'");
	$getPerformanceID = mysql_result($getPerformanceInfo, 0, 'performance_id');

	$sql = "INSERT INTO user_performance VALUES ('$_SESSION[userid]', '$getPerformanceID')";
	$result = mysql_query($sql);

}

if (isset($_POST['delete'])) {
	$getPerformanceInfo = mysql_query("SELECT * FROM performance WHERE name = '$_POST[delete]'");
	$getPerformanceID = mysql_result($getPerformanceInfo, 0, 'performance_id');

	$sql = "DELETE FROM user_performance WHERE $getPerformanceID = performance_id AND $_SESSION[userid] = user_id";
	$result = mysql_query($sql);
}


?>

<html>
<head>
  <title>Edit Performance</title>
  <link rel = "stylesheet" href = "style.css">
  <script type="text/javascript">
		function processDelete(){
			document.forms["deleteperformance"].submit();
			alert("The performance has been succesfully removed from your performance list.");
		}

		function processAdd(){
			document.forms["addperformance"].submit();
			alert("The performance has been succesfully added to your performance list.");
		}

	</script>
</head>
  <body>
  	<center><h1>Edit Your Performance List</h1></center>

	Select performances you would like to add to your list: 
	
	<form style="display: inline;" name="addperformance" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
		<?php
			dbConnect('database_project');
			$sql = "SELECT DISTINCT performance.name
					FROM performance
					LEFT OUTER JOIN user_performance
					ON performance.performance_id = user_performance.performance_id AND user_performance.user_id = $_SESSION[userid]
					WHERE user_performance.performance_id is null";
			$query = mysql_query($sql);
			echo "<select name='add'>";
				echo "<option value=''>Select a performance to add</option>";
				while($query_item = mysql_fetch_array($query)){
					echo "<option value='$query_item[name]'>".htmlspecialchars($query_item["name"])."</option>";
				}
			echo "</select>";
		?><br /><br />
		<input type="button" value="Add" onclick="processAdd()">
	</form><br/><br />

	Select performances you would like to delete from your list:
	<form style="display: inline;" name="deleteperformance" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
		<?php
			dbConnect('database_project');
			//$sql = "SELECT name FROM band";
			$sql = "SELECT DISTINCT performance.name
					FROM performance
					INNER JOIN user_performance
					ON user_performance.user_id = $_SESSION[userid] AND performance.performance_id = user_performance.performance_id
					ORDER BY performance.name";
			$query = mysql_query($sql);
			echo "<select name='delete'>";
				echo "<option value=''>Select a performance to delete</option>";
				while($query_item = mysql_fetch_array($query)){
					echo "<option value='$query_item[name]'>".htmlspecialchars($query_item["name"])."</option>";
				}
			echo "</select>";
		?><br /><br />
		<input type="button" value="Delete" onclick="processDelete()">
	</form>
	<br /><center><button type="button" onclick="location.href='editperformances.php'">Go Back</button>

</body>
</html>