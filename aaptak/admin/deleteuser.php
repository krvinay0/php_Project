<?php
include "..\connection.php";
$id=$_GET['id'];

$deleteuser="DELETE FROM user WHERE id=".$id." ";
$deluser=$conn->query($deleteuser);
if ($deluser) {
	$message="deleted successfully";
	header("Location:user.php?message=".$message);
}
else
{
	$message="unable To delete";
	header("Location:user.php?message=".$message);
}

?>