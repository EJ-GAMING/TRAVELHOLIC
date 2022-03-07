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
        <link rel="stylesheet" href="css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.reboot.min.css">
    <?php include_once 'disable_right_click.php'; ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php include_once 'navbar.php';?>
    <?php include_once 'sidebar.php';?>

            <div id="layoutSidenav_content">
                <main>
                
                    <div class="container-fluid px-4">
                    <h1 class="mt-3">USER ACCOUNT</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Account</li>
                        </ol>



            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew"><i class="fas fa-plus"></i></img>New</a><br>
<br>
<div class="row d-flex justify-content-center">
								      <div class="col-8 text-center h4">
									        <?php include 'includes/msg.php'; ?>
								      </div>
							    </div>
          <div class="card mb-4">
                            <div class="card-header h3">
                                <i class="fas fa-table me-1"></i>
                                Manage Tourist Spot Manager
                                
                            </div>
                            <div class="card-body">

                                <table id="datatablesSimple" class="table table-bordered table-striped">
                                    <thead class="bg-success text-white">
                  
                  <th>Fullname</th>
                  <th>Photo</th>
                  <th>Tourist Spot</th>
                  <th>Tools</th>
                </thead>
                <tbody class="bg-light">
                  <?php
                   
                    $select_query = "SELECT *
                    FROM tbl_ts_manager
                    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
                    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
                    INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
                    INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
                    INNER JOIN refregion ON tbl_tsm_address.regCode = refregion.regCode
                    INNER JOIN refprovince ON tbl_tsm_address.provCode = refprovince.provCode
                    INNER JOIN refcitymun ON tbl_tsm_address.citymunCode = refcitymun.citymunCode
                    INNER JOIN refbrgy ON tbl_tsm_address.brgyCode = refbrgy.brgyCode
                    ORDER BY tbl_ts_manager.tsm_id DESC";
                    $select_result = mysqli_query($conn, $select_query);

                    while($row = mysqli_fetch_assoc($select_result)){

                      ?>
                     
                        <tr>
                          
                          <td><?php echo $row['fname']. ' '. $row['lname'];?></td>
                          <td class="text-center"><img src="../photo/<?php echo $row['photo'];?>" alt="user Image" height="60px">
                          <a href="#" class="btn btn-warning btn-flat" data-bs-toggle="modal" data-bs-target="#photo<?php echo $row['tsm_id']?>"><i class="fa fa-edit"></i></a>
                        </td>
                          <td><?php echo $row['ts_name'];?></td>
                          <td>
                          <a href="#" class="btn btn-success btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#view<?php echo $row['tsm_id']?>" >
                            <i class="fas fa-search me-1"></i>View</a>
                            <a href="#" class="btn btn-warning btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['tsm_id']?>" >
                            <i class="fas fa-edit me-1"></i>Edit</a>
                            <a href="#" class="btn btn-danger btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['tsm_id']?>">
                            <i class="fas fa-trash me-1"></i>Delete</a>
                            
                          
                          </td>
                        </tr>

                        
<div class="modal fade" id="photo<?php echo $row['tsm_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center bg-success text-white">
        <h5 class="modal-title ">
       Update Profile
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="includes/U_A_QUERY/update_tm_photo.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Profile</h4>
          </div>
        </div>
        <input type="hidden" name="tsm_id" value="<?php echo $row['tsm_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['photo'] ?>" onclick="triggerClick2()"  id="profileDisplay2" height="165px" width="200px"/> 
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-6">
              <input type="file" name="photo" onchange="displayImage2(this)" id="profileImage2" class="form-control">  
              </div>
            </div>


 
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img"><i class="fa fa-edit fa-sm"></i>Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>


                          
                        <script>
                          //update
            function triggerClick2(){
             document.querySelector('#profileImage2').click();
            }
            
            function displayImage2(e){
             if(e.files[0]){
               var reader = new FileReader();
            
               reader.onload=function(e) {
                 document.querySelector('#profileDisplay2').setAttribute('src', e.target.result);
               }
               reader.readAsDataURL(e.files[0]);
             }
            }
                        </script>
                        <?php include 'user_account_modal.php'; ?>
                        <?php require_once 'add_tm_modal.php'; ?>

                        <script>
                            	function showPassword5(){
				                        var show = document.getElementById('pass5');
				                          if(show.type == 'password'){
					                          show.type='text';
				                                }else{
					                                show.type='password';
				                                    }
			                                    }

                            </script>
 
                      <?php
                  
                    }
                  ?>
                  
                </tbody>
                  </table>
            </div>
           
          <?php  include_once 'account_modal.php';?>
          <?php require_once 'add_tm_modal.php'; ?>

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
        <script src="js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
       <?php include_once 'address.php'?>
     
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
         <script>
            
            function getAge(){
                var dob = document.getElementById('dob').value;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('age').value=age;
            }

            function getAge1(){
                var dob = document.getElementById('dob1').value;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('age1').value=age;
            }
            
            function getAge5(){
                var dob = document.getElementById('dob5').value;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('age5').value=age;
            }
            
                    </script> 
                       
    </body>
</html>
