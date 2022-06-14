<?php include ('..\user\header.php');
session_start();
if ($_SESSION['usertype']!='2') {
	header('Location:../index.php');
} 
?>

<?php
$userquery="SELECT * FROM user INNER JOIN user_type ON user.id=user_type.user_id WHERE usertype='1' OR usertype='0' ";
$data=$conn->query($userquery);
?>

<div class="row m-0">

	<!-- side bar -->
	<div class="col-2  p-3  bg-danger text-white" id="side_bar">
		<h3 class="text-white" style="background-color:; text-shadow: 2px 2px 4px #000;"><a class="nav-link text-center text-white z-depth-1 p-1" href="index.php">Admin Panel</a></h3>
		<ul class="navbar-nav mt-5">
			<li class="nav-item z-depth-5 mt-1">
				<a class=" btn btn-light btn-block btn-sm" href="user.php">User</a>
			</li>
			<li class="nav-item z-depth-5 mt-1">
				<a class="nav-link text-white btn btn-danger btn-block" href="news.php">News</a>
			</li>
		</ul>
	</div>

	<!-- dashbord body -->
	<div class="col-10">
		<div class="p-3 m-3 col-1o dashbd_in bg-danger z-depth-2" >
			<!-- header  -->
			<h1 align="center">Welcome <?php echo $_SESSION['username']; ?></h1>
			<p class="text-center text-white"><?php echo $_SESSION['email']; ?></p>
		</div>

		<div class="p-3">
			<a href="adduser.php"><button class="btn btn-danger btn-block">Add User +</button> </a>
		</div>

		<div class="p-3 mb-3 table-responsive">
			<table class="table border newsTable">
				<thead>
					<tr>
						<th>S No.</th>
						<th>first_name</th>
						<th>last_name</th>
						<th>email</th>
						<th>Phone No.</th>
						<th>status</th>
						<th>created_at</th>
						<th>User_type</th>
						<th>Action</th>
					</tr>	
				</thead>
				<tbody>
					<?php  foreach ($data as $key=>$user) {  ?>


						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $user['first_name'];?></td>
							<td><?php echo $user['last_name'];?></td>
							<td><?php echo $user['email'];?></td>
							<td><?php echo $user['phone'];?></td>
							<td><?php if ($user['status']==0) {
								echo "Inactive";
							}
							else
							{
								echo "Active";
							}
							?></td>
							<td><?php echo $user['created_at'];?></td>
							<td><?php if ($user['usertype']==0) {
								echo "User";
							}
							else
							{
								echo "Member";
							}
							?></td>

							<td><a href="edituser.php?id=<?php echo $user['user_id'] ?>"><i class="fa fa-edit text-success"></i></a>
								<a href="deleteuser.php?id=<?php echo $user['user_id'] ?>"><i class="fa fa-trash text-danger ml-2"></i></a>
							</td>
						</tr>
						<?php
					} ?>
				</tbody>
			</table>
		</div>

	</div>
</div>

<!-- include footer -->
<?php 
include ('..\user\footer.php'); 
?>