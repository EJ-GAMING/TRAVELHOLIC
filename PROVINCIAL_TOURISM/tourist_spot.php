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
        <title>TRAVELHOLIC: Online Tourbooking</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link href="css/styles.css" rel="stylesheet" />

        <style>
          .img{
            height:80px;
            width:120px;
            align-self: center;
          }
          </style>
        <?php include_once 'disable_right_click.php'; ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php  include_once 'navbar.php';?>
    <?php include_once 'sidebar.php';?>

            <div id="layoutSidenav_content">
                <main>
                <div class="row">
								<div class="col-12">
									<?php include 'includes/msg.php'; ?>
								</div>
							</div>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4">Manage Tourist Spot</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tourist Spot</li>
                        </ol>



                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew"><i class="fas fa-plus"></i></img>New</a><br>
<br>
          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Manage User Account
                                
                            </div>
                            <div class="card-body">

                                <table id="datatablesSimple" class="table table-bordered table-striped"> 
                                <thead class="bg-success text-white">
                  
                  <th>Tourist Spot Name</th>
                  <th>Tourist Manager</th>
                  <th>Images</th>
                  <th>Tools</th>
                </thead>
                <tbody class="bg-light">



                  <?php
                   $provCode = $user['ptprovCode'];
                    $select_query = "SELECT *
                    FROM tbl_ts_manager
                    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
                    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
                    INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
                    INNER JOIN tbl_ts_location on tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
                    INNER JOIN tbl_ts_img on tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
                    INNER JOIN tbl_ts_act_guide on tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
                    INNER JOIN refregion ON tbl_ts_location.tsregCode = refregion.regCode
                    INNER JOIN refprovince ON tbl_ts_location.tsprovCode = refprovince.provCode
                    INNER JOIN refcitymun ON tbl_ts_location.tscitymunCode = refcitymun.citymunCode
                    INNER JOIN refbrgy ON tbl_ts_location.tsbrgyCode = refbrgy.brgyCode
                     WHERE tsprovCode = '$provCode'
		                
                    ORDER BY tbl_ts_info.tsinfo_id DESC";
                      
                      $select_result = mysqli_query($conn, $select_query);
                    
                        
                      $i=0;
                     $num = mysqli_num_rows($select_result);
                    while( $i < $num AND $row = mysqli_fetch_assoc($select_result)){

             
                  

                      ?>
                     
                        <tr>
                          
                          <td><?php echo $row['ts_name'];?></td>
                          <td><div class="col-12"><?php echo $row['fname'].' '.$row['lname']?></div></td>
                          <td class="text-center">
                            <div class="row">
                              <div class="col-md">
                                <span class="h6"><strong>Click Image to Edit</strong></span>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6 d-flex justify-content-center">
                              <a href="#" data-bs-toggle="modal" data-bs-target="#tsphoto1<?php echo $row['tsinfo_id']?>">
                            <img src="../photo/<?php echo $row['img1'];?>" class="img mr-1 mb-1" alt="" height="50px">
                            </a>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#tsphoto2<?php echo $row['tsinfo_id']?>">
                            <img src="../photo/<?php echo $row['img2'];?>" class="img mb-1" alt="" height="50px">
                            </a>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 d-flex justify-content-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#tsphoto3<?php echo $row['tsinfo_id']?>">
                            <img src="../photo/<?php echo $row['img3'];?>" class="img mr-1 mb-1" alt="" height="50px">
                            </a>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#tsphoto4<?php echo $row['tsinfo_id']?>">
                            <img src="../photo/<?php echo $row['img4'];?>" class="img mb-1" alt="" height="50px">
                            </a>
                            </div>
                          </div>
                         
                           
                          </td>
                          <td>
                            <a href="#" class="btn btn-success btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#view<?php echo $row['tsinfo_id']?>" >
                            <i class="fas fa-search me-1"></i>View</a>
                            
                         
                            <a href="#" class="btn btn-warning btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['tsinfo_id']?>" >
                            <i class="fas fa-edit me-1"></i>Edit</a>

                            <a href="#" class="btn btn-danger btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['tsinfo_id']?>">
                            <i class="fas fa-trash me-1"></i>Delete</a>
                          
                          </td>
 <?php            
                        include 'tourist_spot_modal.php'; 
?>

<script src="js/jquery.min.js"></script>
                          <script>
                              $(document).ready(function(){
            $("#<?php echo "region".$i;?>").change(function(){
                var region_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_province.php",
                    method:"POST",
                    data:{regionID:region_id},
                    success:function(data){
                        $("#<?php echo "province".$i;?>").html(data);
                    }
                }); 
            });
            $("#<?php echo "province".$i;?>").change(function(){
                var province_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_city.php",
                    method:"POST",
                    data:{provinceID:province_id},
                    success:function(data){
                        $("#<?php echo "municipal".$i;?>").html(data);
                    }
                });
            });
            $("#<?php echo "municipal".$i;?>").change(function(){
                var city_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_brgy.php",
                    method:"POST",
                    data:{cityID:city_id},
                    success:function(data){
                        $("#<?php echo "brgy".$i;?>").html(data);
                    }
                });
            });
        });
                          </script>
                   
                
                      <?php
                       $i++;
                    }
                  ?>
                  
                </tbody>
                  </table>
            </div>
            <?php  include_once 'profile_modal.php';?>
            <?php include 'tourist_spot_modal.php'; ?>

           
                        
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
        <?php include_once 'address.php'; ?>
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


    </body>
</html>
