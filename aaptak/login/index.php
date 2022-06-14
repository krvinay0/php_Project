<?php
// add header file
include_once('..\user\header0.php');
?>
<div class="container mx-auto p-5">
	
	<div class="container  py-3 bg-danger" style="width: 500px; color: #FFF;">
		<!-- form -->
		<form action="handel_login.php" class="mx-auto" method="post" autocomplete="off">
			<!-- print message -->
			<?php if (isset($_GET['message']))
			{
				?>
				<div  style="margin:10px;">
					<p>
						<?php echo $_GET['message']; ?>
					</p>
				</div>
				<?php 
			} 
			?>
			<!-- form header -->
			<h2 align="center">Login</h2>
			<!-- email -->
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="ex:- xyz@gmail.com" required maxlength="50">
			</div>
			<!-- password -->
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Enter Password" required maxlength="50">
			</div>
			<!-- submit -->
			<div class="form-group" align="center">
				<input type="submit" class="form-group" name="submit" value="Submit">
			</div>
			<!-- redirect to signup -->
			<p><label>Don't have account?<a href="signup.php">SignUp</a></label></p>
		</form>
	</div>
</div>
<?php 
// include fooler file
include_once('..\user\footer.php');
?> 