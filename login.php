<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Admin | Book Store</title>


<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
	if(!is_numeric($key))
	$_SESSION['setting_'.$key] = $value;
}
?>

</head>
<style>
body{
	width: 100%;
	height: calc(100%);
	
}
main#main{
	width:100%;
	height: 100vh;
	background:white;
	background-image: url("bg.jpg");
	background-size: cover;
}
#main{
	padding-top:25vh;
}
.logo {
	margin: auto;
	font-size: 8rem;
	background: white;
	border-radius: 50% 50%;
	height: 29vh;
	width: 13vw;
	display: flex;
	align-items: center;
}
.logo img{
	height: 80%;
	width: 80%;
	margin: auto
}
</style>

<body>


<main id="main">
<div class="card col-md-4 px-5 offset-md-4">
<div class="card-body px-5">
<form id="login-form" >
	<h3 class="text-center">LOGIN</h3>
<div class="form-group">
<label for="username" class="control-label">Username</label>
<input type="text" id="username" name="username" class="form-control">
</div>
<div class="form-group">
<label for="password" class="control-label">Password</label>
<input type="password" id="password" name="password" class="form-control">
</div>
<div class="text-center">
<button class="btn-sm  btn-wave btn-primary">Login</button>
</div>
</form>
</div>
</div>



</main>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
$('#login-form').submit(function(e){
	e.preventDefault()
	$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
	if($(this).find('.alert-danger').length > 0 )
	$(this).find('.alert-danger').remove();
	$.ajax({
		url:'ajax.php?action=login',
		method:'POST',
		data:$(this).serialize(),
		error:err=>{
			console.log(err)
			$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
			
		},
		success:function(resp){
			if(resp == 1){
				location.href ='index.php?page=home';
			}else if(resp == 2){
				location.href ='voting.php';
			}else{
				$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
			}
		}
	})
})
</script>	
</html>