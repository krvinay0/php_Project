<?php 
include"../user/header.php";
session_start();
if ($_SESSION['usertype']!='1') {
	header('Location:../index.php');
}
?>


<!-- dashbord -->
<div class="row m-0">
	<!-- side bar -->
	<div class="col-2  p-3  bg-danger text-white" id="side_bar">
		<h3 class="text-white" style="background-color:; text-shadow: 2px 2px 4px #000;"><a class="nav-link text-center text-white z-depth-1 p-1" href="index.php">Member Panel</a></h3>
		<ul class="navbar-nav mt-5">
			<li class="nav-item z-depth-5 mt-1">
				<a class="nav-link text-white btn btn-danger btn-block" href="news.php">News</a>
			</li>
		</ul>
	</div>

	<!-- dashbord body -->
	<div class="col-10">
		<div class="p-3 m-3 col-1o dashbd_in bg-danger" >
			<!-- header  -->
			<h1 align="center">Welcome <?php echo $_SESSION['username']; ?></h1>
			<p class="text-center text-white"><?php echo $_SESSION['email']; ?></p>
		</div>
		
		<div class="card bg-white m-3">
			<div class="card-header text-danger bg-white">
				<a href="detail.php">
					<h2 class="font-weight-bold text-uppercase">news1</h2>
				</a>
			</div>
			<div class="card-body text-dark">The Enforcement Directorate on Tuesday initiated a probe in the alleged irregularities in land deals in the capital region with the poorest of the poor owning lands worth crores.</div>
		</div>
		<!-- news -->
		<div class="card bg-white m-3">
			<div class="card-header text-danger bg-white">
				<a href="detail.php">
					<h2 class="font-weight-bold text-uppercase">news1</h2>
				</a>
			</div>
			<div class="card-body text-dark">The Enforcement Directorate on Tuesday initiated a probe in the alleged irregularities in land deals in the capital region with the poorest of the poor owning lands worth crores.</div>
		</div>

		<!-- news -->
		<div class="card bg-white m-3">
			<div class="card-header text-danger bg-white">
				<a href="detail.php">
					<h2 class="font-weight-bold text-uppercase">news1</h2>
				</a>
			</div>
			<div class="card-body text-dark">The Enforcement Directorate on Tuesday initiated a probe in the alleged irregularities in land deals in the capital region with the poorest of the poor owning lands worth crores.</div>
		</div>
	</div>	


</div>

<?php
include"../user/footer.php";
?>