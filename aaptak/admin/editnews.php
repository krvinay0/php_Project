<?php 
include ('..\user\header.php');
session_start();
if ($_SESSION['usertype']!='2') {
	header('Location:../index.php');
} 
?>



<?php
$id=$_GET['id'];
$newsquery="SELECT * FROM news WHERE id='".$id."'";
$datanews = $conn->query($newsquery);
$news=$datanews->fetch_assoc();
?>

<!-- dashbord -->
<div class="row m-0">
	<!-- side bar -->
	<div class="col-2  p-3  bg-danger text-white" id="side_bar">
		<h3 class="text-white" style="background-color:; text-shadow: 2px 2px 4px #000;"><a class="nav-link text-center text-white z-depth-1 p-1" href="index.php">Member Panel</a></h3>
		<ul class="navbar-nav mt-5">
			<li class="nav-item z-depth-5 mt-1">
				<a class="nav-link text-white btn btn-danger btn-block" href="user.php">User</a>
			</li>
			<li class="nav-item z-depth-5 mt-1">
				<a class="
				btn btn-light btn-block btn-sm" href="news.php">News</a>
			</li>
		</ul>
	</ul>
</div>



<div class="col-10 "> 
	<div class="p-3 m-3 dashbd_in bg-danger" >
		<!-- header  -->
		<h1 align="center">Welcome <?php echo $_SESSION['username']; ?></h1>
		<p class="text-center text-white"><?php echo $_SESSION['email']; ?></p>
	</div>
	<div class="m-3">
		<?php
		if (isset($_GET['message'])) { ?>
			<h4 class="text-danger"><b>	<?php	echo $_GET['message'];?></b></h4>
		<?php	}
		?>
	</div>

	<div class=" m-3 dashbd_in bg-danger">
		<form action="handleedit.php" class="p-3" method="post" >
			
			<div class=" m-3 ">
				<select id="status" name="status" class="form-control">
					<option>status</option>
					<option value="0">Pending</option>
					<option value="1">Approved</option>
				</select>
			</div>	
			<div class=" m-3">
				<input type="text" name="headline"  value="<?php echo $news['headline']; ?>" class="form-control">
				<input type="hidden" name="id"   value="<?php echo $news['id']; ?>" class="form-control">
			</div>
			<div class=" m-3">
				<textarea name="content" id="content"  class="form-control"><?php echo $news['content']; ?></textarea>
			</div>
			<div align="center">
				<button class="btn btn-info">Update</button>
			</div>
		</form>
	</div>
</div>
</div>


<?php
include ('..\user\footer.php');
?>