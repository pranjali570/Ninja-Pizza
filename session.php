<?php 

	if(isset($_POST['submit'])) {

		setcookie('gender', $_POST['gender'], time()+86400);

		session_start();

		$_SESSION['name'] = $_POST['name'];

		header('Location: index.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sessions</title>
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="text" name="name" placeholder="name">
		<br><br>
		<select name="gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		<br><br>
		<input type="submit" name="submit" value="submit">
	</form>

</body>
</html>