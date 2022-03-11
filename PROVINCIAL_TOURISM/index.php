<?php
session_start();
include '../includes/DB/connection.php';

if(isset($_SESSION['pt']))
{
    $_SESSION['status'] ="YOU ARE ALREADY LOGGED IN";
    header("location: home.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
	<link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/style.css">
	

	<?php include_once 'disable_right_click.php'; ?>

	<title>TRAVELHOLIC: Online Tourbooking</title>
</head>
<body>
<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 d-none d-md-block left">
            <div class="text-center">
                    <br><br><br><br><br><br>
                    <img src="assets/img/logo.png" height="300px"></img>
                    <div class="text-uppercase">
                        <h1>TRAVELHOLIC</h1><br>
                        <h2>An Online Tourbooking system</h2>
						
						
                    </div>
               </div>
            </div>

			<div class="col-lg-6 col-md-6 form-container bg-success">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mb-3">
					<i class="fas fa-user fa-10x"></i>
					</div>
					<div class="heading mb-4">
						<h4>Login into your account</h4>
					</div>
					<form method="POST" action="includes/LOGIN_QUERY/login.php">


					
					
							<div class="row">
								<div class="col-12">
									<?php include 'includes/msg.php'; ?>
								</div>
							</div>
						
						<div class="col-2">
						<label><strong>Username</strong></label>
						</div>
						<div class="form-input">
							<span><i class="fas fa-user"></i></span>
							<input type="text" name="txt_user" placeholder="Username" >
						</div>
						<div class="col-2">
						<label><strong>Password</strong></label>
						</div>
						<div class="form-input">
							<span><i class="fas fa-key"></i></span>
							<input type="password" name="txt_pass" placeholder="Password" id="password">
						</div>
						<div class="form-group">
							<div class="row">
							<div class="col-6 d-flex align-self-start">
							<label><input type="checkbox" class="mr-1" onclick="showPassword();"><strong>Show Password</strong></label>
							</div>
							<div class="col-6 d-flex justify-content-md-end">
								<a href="forget_password.php" style="text-decoration:none;"><span class="text-danger"><u><strong>Forgot Password?</strong></u></span></a>
							</div>
							</div>
						</div>
						<div class="row mb-3">
						<div class="text-center mb-3"> <br>
						<button type="submit" class="btn" name="btn_login"><i class="fa fa-sign-in-alt"></i> <strong>Login</strong></button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
    <script src="js/font-awesome.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
			function showPassword(){
				var show = document.getElementById('password');
				if(password.type == 'password'){
					show.type='text';
				}else{
					show.type='password';
				}
			}
	</script>
</body>
</html>


