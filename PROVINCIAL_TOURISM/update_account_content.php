    
<form method="post" action="includes/UPDATE/update_query.php" enctype="multipart/form-data">

<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="row">
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h4">User's Information</div>
<div class="card-body">
<div class="row">
  <input type="hidden" name="pt_id" value="<?php echo $user['pkpt_id']?>">

    <div class="col-md">
      <label><strong>First Name</strong></label>
      <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $user['ptfname'] ?>">
    </div>

    <div class="col-md">
      <label><strong>Last Name</strong></label>
      <input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?php echo $user['ptlname'] ?>">
    </div>


    <div class="col-12">
      <label><strong>Birthday</strong></label>
      <input type="date" class="form-control" name="bday" placeholder="Birthday"  id="dob1" onblur="getAge1();" value="<?php echo $user['ptbday'] ?>" required>
    </div>

    <div class="col-6">
      <label><strong>Age</strong></label>
      <input type="text" class="form-control" name="age" id="age1" placeholder="Age" readonly required  value="<?php echo $user['ptage'] ?>">

    </div>

<div class="col">
<Label><b>Gender</b></label>
<select name="gender" class="form-control" value="<?php echo $row['gender']?>">
<option disabled selected>Gender</option>
  <option value="Male"
              <?php
if($user['ptgender'] == 'Male'){
echo "selected";
}

?>
              
              >Male</option>
   <option value="Female"
               <?php
if($user['ptgender'] == 'Female'){
echo "selected";
}

?>
               >Female</option>
    </select>
</div>
<div class="col-6">
      <label><strong>Email Address</strong></label>
      <input type="text" class="form-control" name="email" placeholder="Age" value="<?php echo $user['email'] ?>">
    </div>
    <div class="col-6">
      <label><strong>Contact Number</strong></label>
      <input type="text" class="form-control" name="num" placeholder="Contact Number" value="<?php echo $user['phone_num'] ?>">
    </div>
</div>
</div>
</div>
</div>
<!--end lefty-->
<!--right-->
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
  <div class="card-header h3">User Image</div>
    <div class="card-body">
      <div class="row mb-2">
        <div class="col text-center">
          <img src="../photo/<?php echo $user['img'] ?>" height="230px" width="220px"/>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <a href="#" class="btn btn-warning btn-flat text-dark text-center form-control" data-bs-toggle="modal" data-bs-target="#img<?php echo $user['pkpt_id']?>">
          <i class="fa fa-edit"></i> <strong>Edit</strong> </a>
        </div>
      </div>

    </div>
</div>
</div>
<!--end right-->

</div>
<!--left and right end-->



        


<!--ADDRESS-->
<div class="card bg-light mb-3" style="max-width: 78rem;">
<div class="card-header h4">ADDRESS</div>
<div class="card-body">


<div class="row">
                <div class="col-md-3">
                  <Label><b>REGION</b></label>
                    <select id="region" name="region" class="form-control">
                      <option value="<?php echo $user['ptregCode'] ?>"><?php echo $user['regDescr'] ?></option>
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
                  <select name="province" id="province" class="form-control">
                      <option value="<?php echo $user['ptprovCode'] ?>"><?php echo $user['provDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refprovince WHERE regCode = '".$user['ptregCode']."' ORDER BY id";
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
                  <select name="municipal" id="municipal" class="form-control">
                      <option value="<?php echo $user['ptcitymunCode'] ?>"><?php echo $user['citymunDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refcitymun WHERE provCode = '".$user['ptprovCode']."' ORDER BY id";
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
                  <select name="brgy" id="brgy" class="form-control">
                      <option value="<?php echo $user['ptbrgyCode'] ?>"><?php echo $user['brgyDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refbrgy WHERE citymunCode = '".$user['ptcitymunCode']."' ORDER BY id";
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





</div>
</div>

<!--ADDRESS END-->
<!--User Account-->

<!--left and right end-->

<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
<button type="submit" name="update" class="btn btn-flat btn-warning"><i class="fa fa-edit"></i> <strong>Update</strong></button>
</form>

</div>
<script>
            
            //add
            function btnClicked(){
             document.querySelector('#imgProfile').click();
            }
            
            function showImage(e){
             if(e.files[0]){
               var reader = new FileReader();
            
               reader.onload=function(e) {
                 document.querySelector('#imgDisplay').setAttribute('src', e.target.result);
               }
               reader.readAsDataURL(e.files[0]);
             }
            }
                    </script>    