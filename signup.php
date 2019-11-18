<?php
if(isset($_POST['ssubmit']))
{
include 'index.php';

$uname=$_POST['uname'];
$pass=$_POST['pass'];


if(empty($uname) || empty($pass))
{header("Location:index.php?error=signup&usertyped=".$uname);
exit();
}
else{
//$sql="insert into testt(uname,pass) values('$uname', '$pass')";
//$result=$conn->query($sql);
//header("Location:in.php?signup=done&usertyped=".$uname);

	$sql="SELECT uname FROM testt WHERE uname=?";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:index.php?error=sqlerror&usertyped=".$uname);
		exit();

	}
	else{
		mysqli_stmt_bind_param($stmt,"s",$uname);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$result=mysqli_stmt_num_rows($stmt);
		if($result>0){
		header("Location:index.php?error=usernametaken&usertyped=".$uname);
		exit();

		}
		else{
       $sql="INSERT INTO testt (uname,pass) VALUES (?,?)";
       $stmt=mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:index.php?error=sqlerror&usertyped=".$uname);

       }
else{
$hashedpass=password_hash($pass,PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt,"ss",$uname,$hashedpass);
mysqli_stmt_execute($stmt);
		header("Location:in.php?signup=done&usertyped=".$uname);
		exit();

}

		}

	}



}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
			header("Location:index.php?error=someerror&usertyped=".$uname);

}