<?php
// add connection file
include "..\connection.php";
	$email = $_POST['email'];
	$password = $_POST['password'];


// check email and password are match or not
$checkSQL = "SELECT * FROM user WHERE email ='".$email."' AND password ='".$password."'";

// run query
$runCheck = $conn->query($checkSQL);

// condition
if($runCheck->num_rows>0)
{
	$user = $runCheck->fetch_assoc();

	if ($user['status']=='0') {
		$message = 'You account is not active. Please contact admin.';
		header('Location:index.php?message='.$message); 
	}
	else{
		$usertypesql = "SELECT * FROM user_type WHERE user_id='".$user['id']."'";
		$typecheck = $conn->query($usertypesql);

		$type = $typecheck->fetch_assoc();

		// session start
		session_start();

		$_SESSION['username']=$user['first_name'].''.$user['last_name'];
		$_SESSION['usertype'] = $type['usertype'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['id'] = $user['id'];
		
		// check condition
		if ($type['usertype']==2) {
			header('Location:../admin');			
		}
		elseif($type['usertype']==1){
			header('Location:../member');	
		}
		else{
			header('Location:../user');	
		}
	}
}
else
{
	// condintion r not exit print message
	$message = 'User does not exists.';
	header('Location:index.php?message='.$message); 
}

?>


