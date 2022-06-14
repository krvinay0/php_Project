<?php
include ('..\user\header.php');
$id=$_POST['id'];
$headline=$_POST['headline'];
$content=$_POST['content'];
$status=$_POST['status'];
$sql="UPDATE news SET headline='".$headline."' , content ='".$content."',status='".$status."' WHERE id=".$id." ";
$result=$conn->query($sql);
if ($result) {
	$message="Updated Successfully";
	header("Location:news.php?message=".$message);
}
else
{
	$message="Can't Update";
	header("Location:editnews.php?message=".$message);
}
?>