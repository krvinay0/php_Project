<?php 
include"../user/header.php";
session_start();
if ($_SESSION['usertype']!='1') {
	header('Location:../index.php');
}
$news = "SELECT * FROM news";
$data = $conn->query($news);
?>


<!-- dashbord -->
<div class="row m-0">
	<!-- side bar -->
	<div class="col-2  p-3  bg-danger text-white" id="side_bar">
		<h3 class="text-white" style="background-color:; text-shadow: 2px 2px 4px #000;"><a class="nav-link text-center text-white z-depth-1 p-1" href="index.php">Member Panel</a></h3>
		<ul class="navbar-nav mt-5">
			<li class="nav-item z-depth-5 mt-1">
				<a class="
				btn btn-light btn-block btn-sm" href="news.php">News</a>
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

		<div class="m-3">
			<?php
			if (isset($_GET['message'])) { ?>
				<h4 class="text-danger"><b>	<?php	echo $_GET['message'];?></b></h4>
			<?php	}
			?> 
		</div>

		<div class="p-3">
			<a href="addnews.php"><button class="btn btn-danger btn-block">Add News+</button> </a>
		</div>


		

		<!-- news table -->
		<div class="p-3 mb-3 table-responsive">
			<table class="table border newsTable">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Headline</th>
						<th>Created At</th>		
						<th>Action</th>			
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key=>$news) { ?>	
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $news['headline']; ?></td>
							<td><?php echo date('d M Y',strtotime($news['created_at'])); ?></td>
							<td><a href="editnews.php?id=<?php echo $news['id']; ?>" title="Edit">
								<i class="fa fa-edit text-success"></i></a>
								<a href="deletenews.php?id=<?php echo $news['id']; ?>" title="Delete">
									<i class="fa fa-trash  text-danger"></i>			
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>	
	</div>
</div>
</div>

<?php
include"../user/footer.php";
?>