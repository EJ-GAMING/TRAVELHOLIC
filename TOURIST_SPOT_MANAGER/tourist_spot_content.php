
            
<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="card bg-light mb-3"><!--User Info-->
<div class="card-header h4 ">TOURIST SPOT</div>
<div class="card-body">
<form action="includes/UPDATE/update_touristspot.php" method="POST"  enctype="multipart/form-data">

  <div class="row">
    <input type="hidden" name="tsinfo_id" value="<?php echo $ts['tsinfo_id']?>">
    <div class="col-md-12 text-dark">
    <Label><b>Tourist Spot Name</b></label>
      <input type="text" class="form-control" placeholder="Tourist Spot Name" name="ts_name" value="<?php echo $ts['ts_name'];?>">
    </div>
    <div class="col-md-12">
    <Label><b>Tourist Spot Description</b></label>
      <textarea class="form-control" name="ts_des" rows="4" placeholder="Tourist Spot Description"><?php echo $ts['ts_des'];?></textarea>
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
                    <select id="region" name="tsregion" class="form-control">
                      <option value="<?php echo $ts['regCode'] ?>"><?php echo $ts['regDescr'] ?></option>
                      <?php
                        $region = "SELECT * FROM refregion ORDER BY id";
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
                  <select name="tsprovince" id="province" class="form-control">
                      <option value="<?php echo $user['provCode'] ?>"><?php echo $ts['provDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refprovince WHERE regCode = '".$ts['regCode']."' ORDER BY id";
                        $region_result = mysqli_query($conn, $region);
                          while ($row1 = mysqli_fetch_assoc($region_result)) {
                            echo " 
                                  <option value='".$row1['provCode']."'>".$row1['provDesc']."</option>
                                  ";
                          }
                      ?>
                    </select>                  
                  </div>
                  <div class="col-md-3">
                  <Label><b>Municipality</b></label>
                  <select name="tsmunicipal" id="municipal" class="form-control">
                      <option value="<?php echo $user['citymunCode'] ?>"><?php echo $ts['citymunDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refcitymun WHERE provCode = '".$ts['provCode']."' ORDER BY id";
                        $region_result = mysqli_query($conn, $region);
                          while ($row1 = mysqli_fetch_assoc($region_result)) {
                            echo " 
                                  <option value='".$row1['citymunCode']."'>".$row1['citymunDesc']."</option>
                                  ";
                          }
                      ?>
                    </select>                  
                  </div>
                  <div class="col-md-3">
                  <Label><b>Barangay</b></label>
                  <select name="tsbrgy" id="brgy" class="form-control">
                      <option value="<?php echo $user['brgyCode'] ?>"><?php echo $ts['brgyDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refbrgy WHERE citymunCode = '".$ts['citymunCode']."' ORDER BY id";
                        $region_result = mysqli_query($conn, $region);
                          while ($row1 = mysqli_fetch_assoc($region_result)) {
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
    <input type="text" class="form-control" placeholder="Activities" name="ts_act" value="<?php echo $ts['act']?>">
  </div>

  <div class="col">
    <label><strong>Guidelines</strong></label>
    <textarea class="form-control"  name="ts_guide" placeholder="Tourist Spot Description"><?php echo $ts['guide'];?></textarea>
  </div>
  <div class="col-12">
  <label><strong>Maximum Number of Tourist per Day</strong></label>
    <input type="text" class="form-control" placeholder="Max # of Tourists" name="ts_max_num" value="<?php echo $ts['max_num']?>">
    <br>
  <br>
  <br>
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
    <div class="col-md-6 mb-2">
   <img src="../photo/<?php echo $ts['img1'];?>" height="100px"><br>
   <a href="#" class="btn btn-warning btn-sm btn-flat mt-2"data-bs-toggle="modal" data-bs-target="#img1<?php echo $user['tsm_id']?>">
     <i class="fa fa-edit"></i> <strong>Edit</strong></a>

    </div>
    <div class="col-md-6 mb-2">
    <img src="../photo/<?php echo $ts['img2'];?>" height="100px"><br>
    <a href="#" class="btn btn-warning btn-sm btn-flat mt-2" data-bs-toggle="modal" data-bs-target="#img2<?php echo $user['tsm_id']?>">
      <i class="fa fa-edit"></i> <strong>Edit</strong></a>
    </div>
  </div>
  <br>
  <div class="row text-center">
    <div class="col-md-6 mb-2">
    <img src="../photo/<?php echo $ts['img3'];?>" height="100px"><br>
    <a href="#" class="btn btn-warning btn-sm btn-flat mt-2" data-bs-toggle="modal" data-bs-target="#img3<?php echo $user['tsm_id']?>">
      <i class="fa fa-edit"></i> <strong>Edit</strong></a>

    </div>
    <div class="col-md-6 mb-2">
    <img src="../photo/<?php echo $ts['img4'];?>" height="100px"><br>
    <a href="#" class="btn btn-warning btn-sm btn-flat mt-2" data-bs-toggle="modal" data-bs-target="#img4<?php echo $user['tsm_id']?>">
      <i class="fa fa-edit"></i> <strong>Edit</strong></a>

    </div>
  </div>
 
 

</div>
</div>
</div>
<!--end right-->

</div>
<!--left and right end-->


<div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="submit" name="edit" class="btn btn-flat btn-warning "><i class="fa fa-edit"></i> <strong>UPDATE </strong></button>
      </form>
</div>