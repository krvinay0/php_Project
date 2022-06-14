

<?php
include "..\connection.php";
$id=$_GET['id'];

$deletenews="DELETE FROM news WHERE id=".$id." ";
$delnews=$conn->query($deletenews);
if ($delnews) {
	$message="deleted successfully";
	header("Location:news.php?message=".$message);
}
else
{
	$message="unable To delete";
	header("Location:news.php?message=".$message);
}

?>