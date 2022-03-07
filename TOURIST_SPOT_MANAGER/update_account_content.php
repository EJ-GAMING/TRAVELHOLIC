
                 
<form action="includes/UPDATE/update_account.php" method="POST"  enctype="multipart/form-data">
                <input type="hidden" name="tsm_id" value="<?php echo $user['tsm_id'] ?>">
                  <div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
                  <div class="row">
      <div class="col-sm-6">
           <div class="card bg-light mb-3" style="max-width: 50rem;">
            <div class="card-header h4">User's Information</div>
              <div class="card-body">
              <div class="row">
                  
                      <div class="col-md-6">
                        <label><strong>First Name</strong></label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $user['fname'] ?>" required readonly>
                      </div>
              
                      <div class="col-md-6">
                        <label><strong>Last Name</strong></label>
                        <input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?php echo $user['lname'] ?>" required readonly>
                      </div>

                
                      <div class="col-md-6">
                        <label><strong>Birthday</strong></label>
                        <input type="date" class="form-control" name="bday" id="dob1" onblur="getAge1();" placeholder="Tourist Spot Name" value="<?php echo $user['bday'] ?>" required readonly>
                      </div>
                
                      <div class="col-md-6">
                        <label><strong>Age</strong></label>
                        <input type="text" class="form-control" name="age" id="age1" placeholder="Age" value="<?php echo $user['age'] ?>" required readonly>
                      </div>
                
                <div class="col-md-12">
                <Label><b>Gender</b></label>
                <select name="gender" class="form-control" value="<?php echo $user['gender']?>" readonly required>
<option disabled selected>Gender</option>
  <option value="Male"
              <?php
if($user['gender'] == 'Male'){
echo "selected";
}

?>
              
              >Male</option>
   <option value="Female"
               <?php
if($user['gender'] == 'Female'){
echo "selected";
}

?>
               >Female</option>
    </select>
                </div>
                <div class="col-md-6">
                        <label><strong>Cellphone Number</strong></label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $user['phone_num'] ?>" required >
                      </div>
                      <div class="col-md-6">
                        <label><strong>Email Addess</strong></label>
                        <input type="email" class="form-control" name="email" value="<?php echo $user['email'] ?>" required >
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
                          <div class="col d-flex justify-content-center">
                            <img src="../photo/<?php echo $user['photo']?>"height="134px"/>                         
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md  d-flex justify-content-center">
                            <a href="#" class="btn btn-warning btn-flat" data-bs-toggle="modal" data-bs-target="#photo<?php echo $user['tsm_id']?>">
                            <i class="fa fa-edit"></i><strong> Update Profile</strong></a>
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
                    <select id="region" name="region" class="form-control" readonly>
                      <option value="<?php echo $user['regCode'] ?>"><?php echo $user['regDescr'] ?></option>
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
                  <select name="province" id="province" class="form-control" readonly>
                      <option value="<?php echo $user['provCode'] ?>"><?php echo $user['provDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refprovince WHERE regCode = '".$user['regCode']."' ORDER BY id";
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
                  <select name="municipal" id="municipal" class="form-control" readonly>
                      <option value="<?php echo $user['citymunCode'] ?>"><?php echo $user['citymunDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refcitymun WHERE provCode = '".$user['provCode']."' ORDER BY id";
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
                  <select name="brgy" id="brgy" class="form-control" readonly>
                      <option value="<?php echo $user['brgyCode'] ?>"><?php echo $user['brgyDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refbrgy WHERE citymunCode = '".$user['citymunCode']."' ORDER BY id";
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

<!--position and designation-->
<div class="row mb-3">
  <div class="col-md">
    <div class="card">
      <div class="card-header">Position/Designation</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md">
               
<label><strong>Position/Designation</strong></label>
<input type="text" class="form-control" name="pos" placeholder="Position/Designation" value="<?php echo $user['pos']?>">
</div>

<div class="col-md">
<label><strong>Tourist Spot Name</strong></label>
<input type="text" class="form-control" name="tsn" placeholder="Tourist Spot Name" value="<?php echo $user['ts_name']?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  



</div>
<!--center end-->




    


<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
      <button type="submit" name="edit" class="btn btn-flat btn-warning"><i class="fa fa-edit"></i><strong> Update Now</strong></button>
      </form>
</div>

<script>
             function getAge1(){
                var dob = document.getElementById('dob1').value;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('age1').value=age;
            }
        </script>