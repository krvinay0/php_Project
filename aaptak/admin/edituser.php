s<?php 
include ('..\user\header.php'); 
session_start();
if ($_SESSION['usertype']!='2') {
	header('Location:../index.php');
}
$id=$_GET['id'];
$userquery="SELECT * FROM user INNER JOIN user_type ON user.id=user_type.user_id WHERE user_id=".$id."";
$data=$conn->query($userquery);
$user=$data->fetch_assoc();
?>

<div class="row m-0">

	<!-- side bar -->
	<div class="col-2  p-3  bg-danger text-white" id="side_bar">
		<h3 class="text-white" style="background-color:; text-shadow: 2px 2px 4px #000;"><a class="nav-link text-center text-white z-depth-1 p-1" href="index.php">Admin Panel</a></h3>
		<ul class="navbar-nav mt-5">
			<li class="nav-item z-depth-5 mt-1">
				<a class="btn btn-light btn-block btn-sm" href="user.php">User</a>
			</li>
			<li class="nav-item z-depth-5 mt-1">
				<a class="nav-link text-white btn btn-danger btn-block" href="news.php">News</a>
			</li>
		</ul>
	</div>

	<!-- dashbord body -->
	<div class="col-10 mx-auto">
		<div class="p-3 m-3  dashbd_in bg-danger z-depth-2" >
			<!-- header  -->
			<h1 align="center">Welcome <?php echo $_SESSION['username']; ?></h1>
			<p class="text-center text-white"><?php echo $_SESSION['email']; ?></p>
		</div>

		<div class="m-5 p-3 bg-danger text-white">
			<form action="handleuseredit.php" class="" method="post">
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $user['user_id'] ?>">
					<label>Status*</label>
					<select id="status" name="status" class="form-control">
						<option value="0">Inactive</option>
						<option value="1">Active</option>
					</select>
				</div>
				<div class="form-group">
					<label>Usertype*</label>
					<select id="usertype" name="usertype" class="form-control">
						<option value= "0" >USER</option>
						<option value="1" >MEMBER</option>
					</select>
				</div>
				<div class=" text-center">
					<button type="submit" class="btn btn-info">Update</button>
				</div>
			</form>
		</div>

	</div>
</div>

<?php include ('..\user\footer.php'); ?>