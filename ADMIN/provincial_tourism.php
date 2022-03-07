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
                <div class="row d-flex justify-content-center mt-2">
								<div class="col-8 text-center h4">
									<?php include 'includes/msg.php'; ?>
								</div>
							</div>
                    <div class="container-fluid px-4">
                    <h1 class="mt-3">Provincial Tourism</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Provincial Tourism</li>
                        </ol>



            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew"><i class="fas fa-plus"></i></img>New</a><br>
<br>
          <div class="card mb-4">
                            <div class="card-header h3">
                                <i class="fas fa-table me-1"></i>
                                Manage Provincial Tourism
                                
                            </div>
                            <div class="card-body">

                                <table id="datatablesSimple" class="table table-striped table-bordered">
                                    <thead class="bg-success text-white">
                  
                  <th>Fullname</th>
                  <th>Photo</th>
                  <th>Username</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                   
                    $select_query = "SELECT * FROM tbl_provincial_tourism
                                      INNER JOIN refregion ON tbl_provincial_tourism.ptregCode = refregion.regCode
                                      INNER JOIN refprovince ON tbl_provincial_tourism.ptprovCode = refprovince.provCode
                                      INNER JOIN refcitymun ON tbl_provincial_tourism.ptcitymunCode = refcitymun.citymunCode
                                      INNER JOIN refbrgy ON tbl_provincial_tourism.ptbrgyCode = refbrgy.brgyCode";
                    $select_result = mysqli_query($conn, $select_query);

                    while($row = mysqli_fetch_assoc($select_result)){

                      ?>
                     
                        <tr>
                          
                          <td><?php echo $row['ptfname']. ' '. $row['ptlname'];?></td>
                          <td class="text-center"><img src="../photo/<?php echo $row['img'];?>" alt="user Image" height="50px">
                            <a href="#" class="btn btn-warning btn-flat" data-bs-toggle="modal" data-bs-target="#photo<?php echo $row['pkpt_id']?>"><i class="fa fa-edit"></i></a>
                        </td>
                          <td><?php echo $row['uname'];?></td>
                          <td>
                          <a href="#" class="btn btn-success btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#view<?php echo $row['pkpt_id']?>" >
                            <i class="fas fa-search me-1"></i>View</a>
                            <a href="#" class="btn btn-warning btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['pkpt_id']?>" >
                            <i class="fas fa-edit me-1"></i>Edit</a>
                            <a href="#" class="btn btn-danger btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['pkpt_id']?>">
                            <i class="fas fa-trash me-1"></i>Delete</a>
                            
                          
                          </td>
                        </tr>
                        <?php include 'user_account_modal.php'; ?>                       
                      <?php
                  
                    }
                  ?>
                  
                </tbody>
                  </table>
            </div>
           
            <?php include 'add_pt_modal.php'; ?>
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
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <?php include_once 'address.php';?> 
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
            
            function getAge3(){
                var dob = document.getElementById('dob3').value;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('age3').value=age;
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
