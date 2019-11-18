<?php
if(isset($_POST['lsubmit'])){
include 'index.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];


/*$sql="SELECT * FROM testt";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row= $result->fetch_assoc()){
if($row["uname"] == "$uname" && $row["pass"] == "$pass"){
			
		header("Location: in.php?login=success");
}}}else{
	echo "0 result";
}
$conn->close();

*/
if(empty($uname) || empty($pass)){
	header("Location: index.php?error=login&user=".$uname);
	exit();
}
else{
$sql="SELECT * FROM testt WHERE uname=?";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
	header("Location: index.php?error=sqlerror&user=".$uname);
	exit();
}
else{
	mysqli_stmt_bind_param($stmt,"s",$uname);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)){
		$passcheck=password_verify($pass,$row['pass']);
		if($passcheck==false){
				header("Location: index.php?error=wrongpass&user=".$uname);
				exit();

		}
		else if($passcheck==true){
session_start();
$_SESSION['uname']=$row['uname'];
$_SESSION['pass']=$row['pass'];
	header("Location: in.php?login=done&user=".$uname);

		}
		else{
				header("Location: index.php?error=wpass&user=".$uname);
				exit();

		}

	}
	else{
			header("Location: index.php?error=!user&user=".$uname);
			exit();

	}

}




}

}	

else{
		header("Location: index.php?error=someerror&user=".$uname);
		exit();
}