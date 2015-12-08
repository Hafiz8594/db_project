<?php include 'accesscontrol.php'; ?>

<!DOCTYPE html>
<html>

	<head>
		<title>My Personal Information</title>
		<link rel = "stylesheet" href = "style.css">
	</head>
	<body>
		<div class="centered">
			<center><h1>My Personal Information</h1></center>
			<table id="personalinfo">
				<tr>
					<td><h3>First Name: </h3> <?php  echo $_SESSION['first_name']; ?></td>
					<td><h3>Last Name: </h3> <?php echo $_SESSION['last_name'];?></td>
				</tr>
				<tr>
					<td><h3>DOB: </h3> <?php echo $_SESSION['age'] ?>;></td>
					<td><h3>Email: </h3> <?php echo $_SESSION['email']?>></td>
				</tr>
			</table>
		</div>

	</body>

</html>
