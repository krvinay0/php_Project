<?php

include "..\connection.php";


$firstname =$_POST['first_name'];
$lastname =$_POST['last_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$usertype=$_POST['usertype'];

$checkuser='SELECT * FROM user WHERE email="'.$email.'"';
$checkinguser=$conn->query($checkuser);
if ($checkinguser->num_rows>0) {
	$message="USER ALREADY EXIST!!";
	header("LOCATION:adduser.php?message=".$message);
}
else
{

	$insertuserdata = 'INSERT INTO user (first_name,last_name,email,phone,password) VALUES("'.$firstname.'","'.$lastname.'","'.$email.'","'.$phone.'","'.$password.'")';
	$result=$conn->query($insertuserdata);

	if($result)
	{

		$userdata=$conn->query($checkuser);
		$data=$userdata->fetch_assoc();

		if($usertype=='User')
		{	
			$usertype_user='INSERT INTO user_type (user_id,usertype) VALUES ("'.$data['id'].'","0")';
			$conn->query($usertype_user);
		}
		else {


			$usertype_user='INSERT INTO user_type (user_id,usertype) VALUES ("'.$data['id'].'","1")';
			$conn->query($usertype_user);

		}
		$message="ADDED SUCCESSFULLY";
		header('LOCATION:user.php?message='.$message);

	}
	else
	{	$message="Unable TO Add";
		header('LOCATION:user.php?message='.$message);
	}

}
?>