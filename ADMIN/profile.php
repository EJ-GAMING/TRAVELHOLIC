<?php include_once 'includes/session.php'; 
 ?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
        <title>TRAVELHOLIC: Online Tourbooking</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
              <link rel="stylesheet" href="css/bootstrap.css"/>        
              <link href="css/styles.css" rel="stylesheet" /> 
              <?php include_once 'disable_right_click.php'; ?>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php include_once 'navbar.php';?>
    <?php include_once 'sidebar.php';?>

            <div id="layoutSidenav_content">
                <main>
                
                    <div class="container-fluid px-4">
                    <h1 class="mt-3">UPDATE PROFILE</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Prfile</li>
                        </ol>

<div class="row mb-3">
    <div class="col">
    <a href="home.php" class="btn btn-light text-success"><i class="fa fa-arrow-left fa-lg"></i></a>
    </div>
</div>

                        <!--body-->
                        <div class="row d-flex justify-content-center">
								<div class="col-md-8">
									<?php include 'includes/msg.php'; ?>
								</div>
							</div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <div class="card" style="max-width: 50rem;">
                                    <div class="card-header bg-success text-white text-center h4">Update Profile</div>
                                    <div class="card-body">
                                    <form action="includes/PROFILE/update_profile.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col text-center">
                                                <img class="rounded-circle" src="<?php echo (!empty($user['photo'])) ? 'includes/PROFILE/upload/'.$user['photo'] : '../photo/profile.jpg';?>"height="150px" class="img-rounded"/>      
                                            </div>
                                        </div>
                                        <div class="row mb-4 mt-2 ">
                                            <div class="col d-flex justify-content-center">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#update_photo" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i>Edit Profile</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="uname" class="col-sm-2 col-form-label"><strong>Firstname</strong></label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="fname" Value="<?php echo $user['fname'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><strong>Lastname</strong></label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="lname" Value="<?php echo $user['lname'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><strong>Email Address</strong></label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="email" Value="<?php echo $user['email'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><strong>Password</strong></label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="pass" id="pass3" placeholder="Enter Password to Save Changes">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col d-flex justify-content-md-end">
                                                        <label><input type="checkbox" class="mr-1" onclick="showPass();"><strong>Show Password</strong></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                            <button type="submit" name="update" class="btn btn-flat btn-warning"><i class="fa fa-edit"></i><strong> Update Now</strong></button>
                                            </form>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>




            <?php  include_once 'account_modal.php';?>
  
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            
//add
function triggerClick(){
 document.querySelector('#profileImage').click();
}

function displayImage(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}
        </script>  
        
        <script type="text/javascript">
			function showPass(){
				var show = document.getElementById('pass3');
				if(show.type == 'password'){
					show.type='text';
				}else{
					show.type='password';
				}
			}
	</script>
    </body>
</html>
