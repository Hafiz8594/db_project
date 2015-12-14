<?php include 'adminaccesscontrol.php'; ?>

<html>
<head>
  <title>Welcome</title>
  <link rel = "stylesheet" href = "style.css">
</head>
  <body>

  <form name="MY Form"action="Login">
	<fieldset>

		<legend>Hello <?php echo $_SESSION['first_name']; ?> </legend>
		<center>
			<table>
				<tr>
					<td><button onClick = "location.href='personalinfo.php'" style="width: 200px; height: 60px" type="button">My Personal Info</button></td>
					<td><button onClick = "location.href='myfavoritebands.php'" style="width: 200px; height: 60px" type="button">My Favorite Bands</button></td>
				</tr>
				<tr>
					<td><button onClick = "location.href='myshows.php'" style="width: 200px; height: 60px" type="button">My Shows</button></td>
					<td><button onClick = "location.href='myalbums.php'" style="width: 200px; height: 60px" type="button">My Albums</button></td>
				</tr>
				<tr>
					<td><button onClick = "location.href='bandcomments.php'" style="width: 200px; height: 60px" type="button">Band Comments</button></td>
					<td><button onClick = "location.href='performancecomments.php'" style="width: 200px; height: 60px" type="button">Performance Comments</button></td>
				</tr>
				<tr>
					<td><button onClick = "location.href='bandcomments.php'" style="width: 200px; height: 60px" type="button">Add New Bands</button></td>
					<td><button onClick = "location.href='performancecomments.php'" style="width: 200px; height: 60px" type="button">Add New Albums</button></td>
				</tr>
				<tr>
					<td><button onClick = "location.href='bandcomments.php'" style="width: 200px; height: 60px" type="button">Add Performances</button></td>
				</tr>
			</table>
		</center>
	</fieldset>
  </form>

  </body>

</html>