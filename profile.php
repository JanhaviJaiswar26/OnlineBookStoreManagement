<section class="page-section" id="menu">
<?php if(isset($_POST['updateProfile'])) {
	$userId=$_POST['userId'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$gender=$_POST['gender'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	$sql = "UPDATE `user_info` SET `first_name`='$first_name',`last_name`='$last_name',`gender`='$gender',`mobile`='$mobile',`address`='$address' WHERE `user_id`='$userId'";
	if($conn->query($sql)){
		$_SESSION['login_first_name']=$first_name;
		$_SESSION['login_last_name']=$last_name;
		$_SESSION['login_gender']=$gender;
		$_SESSION['login_mobile']=$mobile;
		$_SESSION['login_address']=$address;
	}
	header("location:".$_SERVER['HTTP_REFERER']);
	exit();
}?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
			<h3 class="text-center">Edit Profile</h3>			
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 offset-lg-4">
				<form method="POST">
					<div class="form-group">
						<input type="hidden" name="userId" value="<?= $_SESSION['login_user_id']; ?>">
						<label for="" class="control-label">Firstname</label>
						<input type="text" name="first_name" required="" class="form-control" value="<?= $_SESSION['login_first_name']; ?>">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Lastname</label>
						<input type="text" name="last_name" required="" class="form-control" value="<?= $_SESSION['login_last_name']; ?>">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Email</label>
						<input type="text" name="email" required="" class="form-control" value="<?= $_SESSION['login_email']; ?>">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Password</label>
						<input type="password" name="password" required="" class="form-control" value="<?= $_SESSION['login_password']; ?>">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Contact</label>
						<input type="text" name="mobile" required="" class="form-control" value="<?= $_SESSION['login_mobile']; ?>">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Address</label>
						<textarea cols="30" rows="3" name="address" required="" class="form-control"><?= $_SESSION['login_address']; ?></textarea>
					</div>
					<!-- <div class="form-group">
						<label for="" class="control-label">Email</label>
						<input type="email" name="email" required="" class="form-control" value="<?= $_SESSION['login_email']; ?>">
					</div> -->

					<button class="button btn btn-info btn-sm" name="updateProfile">UPDATE</button>
				</form>
			</div>
		</div>
	</div>

</section>