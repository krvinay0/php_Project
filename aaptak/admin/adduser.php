<?php 
include ('..\user\header.php');
session_start();
if ($_SESSION['usertype']!='2') {
	header('Location:../index.php');
} 
?>

<div class="container">
	
	<div class="container m-5 py-3 bg-danger" style="width: 500px; color: #FFF;">
		<!-- from -->
		<form action="handleadduser.php" method="post" autocomplete="off" onsubmit="return validateForm()">
			<!-- header of form -->
			<h2 align="center">Add User</h2>
			<!-- php program print message -->
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
			<!-- first name -->
			<div class="form-group">
				<label>First Name *</label>
				<input type="text" class="form-control" name="first_name" id="first_name" placeholder="ex:- Vinay" maxlength="30"  required>
				<!-- message print -->
				<p id="f_namecheck"></p>
			</div>
			<!-- Last name -->
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" name="last_name" id="last_name" placeholder="ex:- Kumar" maxlength="30">
				<!-- message print -->
				<p id="l_namecheck"></p>
			</div>
			<!-- email -->
			<div class="form-group">
				<label>Email *</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="ex:- xyz@gmail.com" maxlength="50" required>
				<!-- message print -->
				<p id="emailcheck"></p>
			</div>
			<!-- password -->
			<div class="form-group">
				<label>Password *</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password"maxlength="50" required >
				<!-- message print -->
				<p id="passwordcheck"></p>
			</div>
			<!--confirm password -->
			<div class="form-group">
				<label>Confirm Password *</label>
				<input type="password" class="form-control" name="Cpassword" id="Cpassword" placeholder="Re-Enter Password"maxlength="50" required >
				<!-- message print -->
				<p id="Cpasswordcheck"></p>
			</div>
			<!-- mobile -->
			<div>
				<label>Mobile</label>
				<input type="tel" name="phone" id="phone" class="form-control"  placeholder="+918507450403" required maxlength="13">
				<p id="phonecheck"></p>					

			</div>
			<!-- select user type -->			
			<div class="form-group">
				<label>Usertype *</label>
				<select id="usertype" name="usertype" class="form-control">
					<option value="User">USER</option>
					<option value="Member">MEMBER</option>
				</select>
			</div>
			<!-- submit -->
			<div class="form-group" align="center">
				<input type="submit" class="form-group btn" name="submit" value="Add">
			</div>
		</form>
	</div>
</div>




<?php
include ('..\user\footer.php');
?>