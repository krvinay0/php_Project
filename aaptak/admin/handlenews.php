<?php 
include ('..\user\header.php');
session_start();
if ($_SESSION['usertype']!='2') {
	header('Location:../index.php');
} 
$headline=$_POST['headline'];
$content=$_POST['content'];


$newsquery ='INSERT INTO news (member_id,headline,content) VALUES ("'.$_SESSION['id'].'","'.$headline.'","'.$content.'")';

$newsresult=$conn->query($newsquery);
if ($newsresult) {
	
	header('Location:news.php');
}
else
{
	echo "cannot insert";
}

?>