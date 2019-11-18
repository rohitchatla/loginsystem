<?php
session_start();
?>
<?php
$conn=mysqli_connect("localhost","root","","test");
if(!$conn){
	echo("connection error".mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="login.php" method="post"">
		<input type="text" name="uname" placeholder="Username">
		<input type="password" name="pass" placeholder="Password">
		<input type="submit" name="lsubmit" value="Login" placeholder="Login">
	</form>
	<br><br><br><br><br><br>
<h1>Signup</h1>	

	<form action="signup.php" method="post"">
		<input type="text" name="uname" placeholder="Username">
		<input type="password" name="pass" placeholder="Password">
		<input type="submit" name="ssubmit" value="Signup" placeholder="Login">
	</form>
</body>
</html>