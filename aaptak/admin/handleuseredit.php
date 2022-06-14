<?php

include "..\connection.php";
$id=$_POST['id'];
$status=$_POST['status'];
$usertype=$_POST['usertype'];

$update_user="UPDATE user SET status='".$status."' WHERE id=".$id."";
$update_usertype="UPDATE user_type SET usertype='".$usertype."' WHERE user_id=".$id."";
$upresult=$conn->query($update_usertype);
$result=$conn->query($update_user);
if ($result) {
	if ($upresult) {
		header("Location:user.php");
	}

}
else
{
	header("Location:editusers.php");
}

?>