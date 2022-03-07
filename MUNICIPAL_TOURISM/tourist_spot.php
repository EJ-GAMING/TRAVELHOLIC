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
                   $mun = $user['mtm'];
                    $select_query = mysqli_query($conn, "SELECT *
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
                                  WHERE tscitymunCode = '$mun'
                                 
                                 ORDER BY tbl_ts_info.tsinfo_id DESC");
                   
                    
                        
                      $i=0;
                     $num = mysqli_num_rows($select_query);
                    while( $i < $num && $row = mysqli_fetch_assoc($select_query)){

             
                  

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
                         
    
    <!-- EDIT -->
    <div class="modal fade" id="edit<?php echo $row['tsinfo_id'] ?>" data-bs-backdrop="static">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="exampleModalLabel">Add Tourist Spot</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form method="post" action="includes/TS_QUERY/update.php" enctype="multipart/form-data">
                <div class="modal-body">

<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="card bg-light mb-3" style="max-width: 78rem;"><!--User Info-->
<div class="card-header h4 ">TOURIST SPOT</div>
<div class="card-body">

  <div class="row">
    <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id']?>">
    <div class="col-md-12 text-dark">
    <Label><b>Tourist Spot Name</b></label>
      <input type="text" class="form-control" placeholder="Tourist Spot Name" name="ts_name" value="<?php echo $row['ts_name'];?>">
    </div>
    <div class="col-md-12">
    <Label><b>Tourist Spot Description</b></label>
      <textarea class="form-control" name="ts_des" rows="4" placeholder="Tourist Spot Description"><?php echo $row['ts_des'];?></textarea>
    </div>
  </div>
  




</div>
</div><!--User Info End-->
<!--LOCATION-->
<div class="card bg-light mb-3" style="max-width: 78rem;">
<div class="card-header h4 ">LOCATION</div>
<div class="card-body">
 

                     
                <div class="row">
                <div class="col-md-3">
                  <Label><b>REGION</b></label>

                  
                    <select id="<?php echo "region".$i;?>" name="ts_region" class="form-control">
                      <option value="<?php echo $row['tsregCode'] ?>"><?php echo $row['regDescr'] ?></option>
                      <?php
                        $regCode = $user['ptregCode'];
                        $region = "SELECT * FROM refregion 
                        WHERE regCode = '$regCode'
                        ORDER BY id";
                        $region_result = mysqli_query($conn, $region);
                          while ($row1 = mysqli_fetch_assoc($region_result)) {
                            echo " 
                                  <option value='".$row1['regCode']."'>".$row1['regDescr']."</option>
                                  ";
                          }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-3 text-dark">
                  <Label><b>PROVINCE</b></label>
                  <select name="ts_province" id="<?php echo "province".$i;?>" class="form-control">
                      <option value="<?php echo $row['tsprovCode'] ?>"><?php echo $row['provDesc'] ?></option>
                      <?php
                        $province = "SELECT * FROM refprovince WHERE regCode = '".$row['tsregCode']."' ORDER BY id";
                        $province_result = mysqli_query($conn, $province);
                          while ($row1 = mysqli_fetch_assoc($province_result)) {
                            echo " 
                                  <option value='".$row1['provCode']."'>".$row1['provDesc']."</option>
                                  ";
                          }
                      ?>
                    </select>                  
                  </div>
                  <div class="col-md-3">
                  <Label><b>Municipality</b></label>
                  <select name="ts_municipal" id="<?php echo "municipal".$i;?>" class="form-control">
                      <option value="<?php echo $row['tscitymunCode'] ?>"><?php echo $row['citymunDesc'] ?></option>
                      <?php
                        $municipal = "SELECT * FROM refcitymun WHERE provCode = '".$row['tsprovCode']."' ORDER BY id";
                        $municipal_result = mysqli_query($conn, $municipal);
                          while ($row1 = mysqli_fetch_assoc($municipal_result)) {
                            echo " 
                                  <option value='".$row1['citymunCode']."'>".$row1['citymunDesc']."</option>
                                  ";
                          }
                      ?>
                    </select>                  
                  </div>
                  <div class="col-md-3">
                  <Label><b>Barangay</b></label>
                  <select name="ts_brgy" id="<?php echo "brgy".$i;?>" class="form-control">
                      <option value="<?php echo $row['tsbrgyCode'] ?>"><?php echo $row['brgyDesc'] ?></option>
                      <?php
                        $brgy = "SELECT * FROM refbrgy WHERE citymunCode = '".$row['tscitymunCode']."' ORDER BY id";
                        $brgy_result = mysqli_query($conn, $brgy);
                          while ($row1 = mysqli_fetch_assoc($brgy_result)) {
                            echo " 
                                  <option value='".$row1['brgyCode']."'>".$row1['brgyDesc']."</option>
                                  ";
                          }
                      ?>
                    </select>                  
                  </div>
                </div>
  <br>
 
 



</div>
</div>

<!--ADDRESS END-->


</div><!--CENTER END-->

<!--left and right-->
<div class="row">
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header  h4">ACTIVITIES & GUIDELINES</div>
<div class="card-body">
<div class="row">
  <div class="col-12">
    <br>
    <label><strong>Activities</strong></label>
    <input type="text" class="form-control" placeholder="Activities" name="ts_act" value="<?php echo $row['act']?>">
  </div>

  <div class="col-md-12">
    <label><strong>Guidelines</strong></label>
    <textarea class="form-control"  name="ts_guide" placeholder="Tourist Spot Description"><?php echo $row['guide'];?></textarea>
  </div>
  <div class="col-md-6">
  <label><strong>Max Number of Tourist per Day</strong></label>
    <input type="text" class="form-control" placeholder="Max # of Tourists" name="ts_max_num" value="<?php echo $row['max_num']?>">
  </div>
  <div class="col-md-6">
    <label><strong>Status(Open Or Closed)</strong></label>
    <select name="status" class="form-control" value="<?php echo $row['ts_status']?>">
                <?php
                if ($row['ts_status'] === 'Open') {
                  echo '<option value="Open">Open</option>';
                  echo '<option value="Closed">Closed</option>';
                }else {
                  echo '<option value="Closed">Closed</option>';
                  echo '<option value="Open">Open</option>';
                }
?>
    </select>
  </div>

</div>
</div>
</div>
</div>
<!--end lefty-->
<!--right-->
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header  h4">IMAGES</div>


<div class="card text-white bg-dark mb-3 text-center" style="max-width: 37rem;">

<div class="card-body">
  
  
  <div class="row text-center">
    <div class="col-6">
   <img src="../photo/<?php echo $row['img1'];?>" height="100px">

    </div>
    <div class="col-6">
    <img src="../photo/<?php echo $row['img2'];?>" height="100px">
    </div>
  </div>
  <br>
  <div class="row text-center">
    <div class="col-6">
    <img src="../photo/<?php echo $row['img3'];?>" height="100px">

    </div>
    <div class="col-6">
    <img src="../photo/<?php echo $row['img4'];?>" height="100px">

    </div>
  </div>
 
 

</div>
</div>
</div>
<!--end right-->

</div>
<!--left and right end-->

</div>

</div>
      <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
      <button type="submit" class="btn btn-warning text-white" name="update"><i class="fa fa-edit"></i>Update</button>
      
      </form>

    </div>
  </div>
</div>
</div>



    
    <!-- search -->
    <div class="modal fade" id="view<?php echo $row['tsinfo_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="exampleModalLabel">Travelholic: Online Tourbooking System</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                <div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
            <div class="card bg-light mb-3" style="max-width: 78rem;"><!--User Info-->
              <div class="card-header h4 ">TOURIST SPOT</div>
                <div class="card-body">
            
                  <div class="row">
                    <div class="col-md-12 text-dark">
                    <Label><b>Tourist Spot Name</b></label>
                      <input type="text" class="form-control" placeholder="Tourist Spot Name" name="ts_name" value="<?php echo $row['ts_name'];?>" readonly>
                    </div>
                    <div class="col-md-12">
                    <Label><b>Tourist Spot Description</b></label>
                      <textarea class="form-control" name="ts_des" rows="4" placeholder="Tourist Spot Description" readonly><?php echo $row['ts_des'];?></textarea>
                    </div>
                  </div>
                  



               
                </div>
            </div><!--User Info End-->
            <!--LOCATION-->
            <div class="card bg-light mb-3" style="max-width: 78rem;">
              <div class="card-header h4 ">LOCATION</div>
                <div class="card-body">
                 
               
                  <div class="row">
                    <div class="col-md-3">
                      <Label><b>REGION</b></label>
                        <input type="text" class="form-control" placeholder="REGION" name="ts_street" value="<?php echo $row['regDescr'];?>" readonly>
                    </div>
                    <div class="col-md-3">
                      <Label><b>Province</b></label>
                        <input type="text" class="form-control" placeholder="Province" name="ts_province" value="<?php echo $row['provDesc'];?>"readonly>
                    </div>
                    <div class="col-md-3">
                      <Label><b>Municipality</b></label>
                        <input type="text" class="form-control" placeholder="Municipality" name="ts_municipal" value="<?php echo $row['citymunDesc'];?>"readonly>
                    </div>
                    <div class="col-md text-dark">
                      <Label><b>Barangay</b></label>
                        <input type="text" class="form-control" placeholder="Barangay" name="ts_brgy" value="<?php echo $row['brgyDesc'];?>"readonly>
                    </div>
                  </div>
                  <br>
                 
                 


               
                </div>
            </div>

            <!--ADDRESS END-->
            
            
            </div><!--CENTER END-->

           <!--left and right-->
      <div class="row">
             <div class="col-sm-6">
             <div class="card bg-light mb-3" style="max-width: 50rem;">
              <div class="card-header  h4">ACTIVITIES & GUIDELINES</div>
                <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <br>
                    <label><strong>Activities</strong></label>
                    <input type="text" class="form-control" placeholder="Activities" name="ts_act" value="<?php echo $row['act']?>"readonly>
                  </div>
                
                  <div class="col">
                    <label><strong>Guidelines</strong></label>
                    <textarea class="form-control"  name="ts_guide" placeholder="Tourist Spot Description"readonly><?php echo $row['guide'];?></textarea>
                  </div>
                  <div class="col-12">
                  <label><strong>Maximum Number of Tourist per Day</strong></label>
                    <input type="text" class="form-control" placeholder="Max # of Tourists" name="ts_max_num" value="<?php echo $row['max_num']?>"readonly>
                  </div>
                </div>
                </div>
            </div>
             </div>
             <!--end lefty-->
             <!--right-->
             <div class="col-sm-6">
             <div class="card bg-light mb-3" style="max-width: 50rem;">
              <div class="card-header  h4">IMAGES</div>
              

             <div class="card text-white bg-dark mb-3 text-center" style="max-width: 37rem;">
            
                <div class="card-body">
                  
                  
                  <div class="row text-center">
                    <div class="col-6">
                   <img src="../photo/<?php echo $row['img1'];?>" height="100px">
                    </div>
                    <div class="col-6">
                    <img src="../photo/<?php echo $row['img2'];?>" height="100px">
                    </div>
                  </div>
                  <br>
                  <div class="row text-center">
                    <div class="col-6">
                    <img src="../photo/<?php echo $row['img3'];?>" height="100px">
                    </div>
                    <div class="col-6">
                    <img src="../photo/<?php echo $row['img4'];?>" height="100px">
                     
                    </div>
                  </div>
                 
                 
                
                </div>
            </div>
             </div>
             <!--end right-->

      </div>
           <!--left and right end-->

      </div>


            </div>
      <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-arrow-left"></i> Back</button>
      

    </div>
  </div>
</div>
</div>



  <!-- Modal DELETE -->
  <div class="modal fade" id="delete<?php echo $row['tsinfo_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-success text-white">
    <form action="includes/U_A_QUERY/delete.php" method="POST" enctype="multipart/form-data">

      <h5 class="modal-title" id="exampleModalLabel">Travelholic: Online Tourist Booking</h5>
      <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col text-center">

              <input type="hidden" name="id" value="<?php echo $row['tsinfo_id']?>"/>
              Are your sure you want to Delete
              <strong><?php echo $row['ts_name'];?>'s</strong>
            
                Record?
        </div>
      </div>
     
    </div>
    <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>No</button>
      <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i> Delete</button>
      </form>

    </div>
  </div>
</div>
</div>

<!-- TS IMAGES UPDATE-->
<!-- TS IMG1 UPDATE-->


<div class="modal fade" id="tsphoto1<?php echo $row['tsinfo_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center bg-success text-white">
        <h5 class="modal-title ">
       Image 1 Update
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="includes/TS_QUERY/ts_img_update.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Profile</h4>
          </div>
        </div>
        <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['img1'] ?>" height="165px" width="200px"/> 
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-6">
              <input type="file" name="photo" class="form-control">  
              </div>
            </div>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img1"><i class="fa fa-edit fa-sm"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- TS IMG2 UPDATE-->


<div class="modal fade" id="tsphoto2<?php echo $row['tsinfo_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center bg-success text-white">
        <h5 class="modal-title ">
       Image 2 Update
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="includes/TS_QUERY/ts_img_update.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Image 2</h4>
          </div>
        </div>
        <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['img2'] ?>" height="165px" width="200px"/> 
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-6">
              <input type="file" name="photo" class="form-control">  
              </div>
            </div>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img2"><i class="fa fa-edit fa-sm"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- TS IMG3 UPDATE-->


<div class="modal fade" id="tsphoto3<?php echo $row['tsinfo_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center bg-success text-white">
        <h5 class="modal-title ">
       Image 3 Update
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="includes/TS_QUERY/ts_img_update.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Image 3</h4>
          </div>
        </div>
        <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['img3'] ?>" height="165px" width="200px"/> 
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-6">
              <input type="file" name="photo" class="form-control">  
              </div>
            </div>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img3"><i class="fa fa-edit fa-sm"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- TS IMG4 UPDATE-->


<div class="modal fade" id="tsphoto4<?php echo $row['tsinfo_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center bg-success text-white">
        <h5 class="modal-title ">
       Image 4 Update
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="includes/TS_QUERY/ts_img_update.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Image 4</h4>
          </div>
        </div>
        <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['img4'] ?>" height="165px" width="200px"/> 
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-6">
              <input type="file" name="photo" class="form-control">  
              </div>
            </div>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img4"><i class="fa fa-edit fa-sm"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>


                       

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
           
            <?php  include_once 'tourist_spot_modal.php';?>
 
  
                        
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
