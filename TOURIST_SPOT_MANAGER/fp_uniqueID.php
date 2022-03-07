<?php
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
	$fullname = $_SESSION['fullname'];
 
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
	<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
						<h4>Verify Your Account</h4>
					</div>
					<form method="POST" action="includes/LOGIN_QUERY/session_userID.php">


					
					
							<div class="row">
								<div class="col-12">
									<?php include 'includes/msg.php'; ?>
								</div>
							</div>
                            <div class="row">
							<div class="col-md d-flex align-self-start ">
								<a href="forget_password.php"><i class="fa fa-arrow-left fa-lg mb-2 text-dark"></i></a>
							</div>
						</div>
						<div class="col-md d-flex align-self-start	">
						<label><strong>Fullname</strong></label>
						</div>
						<div class="form-input">
							<span><i class="fas fa-user"></i></span>
							<input type="text" name="fullname" value="<?php echo $fullname; ?>" readonly>
						</div>
                            <div class="col-md d-flex align-self-start	">
						<label><strong>Email Address</strong></label>
						</div>
						<div class="form-input">
							<span><i class="fas fa-user"></i></span>
							<input type="text" name="email" value="<?php echo $email; ?>" readonly>
						</div>
						
						<div class="col-md d-flex align-self-start	">
						<label><strong>Enter Your User ID</strong></label>
						</div>
						<div class="form-input">
							<span><i class="fas fa-user"></i></span>
							<input type="text" name="user_ID" placeholder="Enter your User ID">
						</div>
						
						<div class="row mb-3">
						<div class="text-center mb-3"> <br>
						<button type="submit" class="btn" name="change"><i class="fa fa-arrow-right"></i> <strong>Next</strong></button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
    
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
<?php
}else {
    $_SESSION['status'] = 'Please Insert your Username';
    header("location: forget_password.php");
    unset($_SESSION['username']);
    exit();
}
?>


