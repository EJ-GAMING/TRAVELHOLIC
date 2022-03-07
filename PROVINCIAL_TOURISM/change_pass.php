<?php
session_start();

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
	<link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">

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
						<h4>Update Your Account</h4>
					</div>
					<form method="POST" action="includes/LOGIN_QUERY/fp_update_account.php">


					
					
							<div class="row">
								<div class="col-12">
									<?php include 'includes/msg.php'; 
										$code = $_GET['code'];
									?>
								</div>
							</div>
                            <div class="row">
							<div class="col-md d-flex align-self-start ">
								<a href="fp_uniqueID.php"><i class="fa fa-arrow-left fa-lg mb-2 text-dark"></i></a>
							</div>
						</div>
						<input type="hidden" name="user_id" value="<?php echo $code;?>">

                            <div class="col-md d-flex align-self-start	">
						<label><strong>Enter New Username</strong></label>
						</div>
						<div class="form-input">
							<span><i class="fas fa-user"></i></span>
							<input type="text" name="uname" Placeholder="Enter New Username" required>
						</div>
						
						<div class="col-md d-flex align-self-start	">
						<label><strong>Enter New Password</strong></label>
						</div>
						<div class="form-input">
							<span><i class="fas fa-lock"></i></span>
							<input type="password" name="pass1" id="password1" placeholder="Enter New Password"required>
						</div>
                        <div class="col-6 d-flex align-self-start">
							<label><input type="checkbox" class="mr-1" onclick="showPassword1();"><strong>Show Password</strong></label>
							</div>
                       
					
						<div class="row mb-3">
						<div class="text-center mb-3"> <br>
						<button type="submit" class="btn" name="update"><i class="fa fa-edit"></i> <strong>Update</strong></button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
			function showPassword1(){
				var show = document.getElementById('password1');
				if(show.type == 'password'){
					show.type='text';
				}else{
					show.type='password';
				}
			}
            function showPassword2(){
				var show2 = document.getElementById('password2');
				if(show2.type == 'password'){
					show2.type='text';
				}else{
					show2.type='password';
				}
			}
	</script>
</body>
</html>


