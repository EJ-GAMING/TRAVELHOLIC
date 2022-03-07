
<!--EDIT-->
<div class="modal fade" id="edit<?php echo $row['tsm_id']?>" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header bg-success text-white text-center">
   <form method="POST" action="includes/U_A_QUERY/update.php" enctype="multipart/form-data">

                <h5 class="modal-title " >EDIT Tourist Manager Account</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                 

                <input type="hidden" name="tsm_id" value="<?php echo $row['tsm_id'] ?>">
                  <div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
                  <div class="row">
      <div class="col-sm-6">
           <div class="card bg-light mb-3" style="max-width: 50rem;">
            <div class="card-header h4">User's Information</div>
              <div class="card-body">
              <div class="row">
                  
                      <div class="col-md-6">
                        <label><strong>First Name</strong></label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $row['fname'] ?>" required>
                      </div>
              
                      <div class="col-md-6">
                        <label><strong>Last Name</strong></label>
                        <input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?php echo $row['lname'] ?>" required>
                      </div>

                
                      <div class="col-md-6">
                        <label><strong>Birthday</strong></label>
                        <input type="date" class="form-control" name="bday" id="dob" onblur="getAge();" placeholder="Birthdate" value="<?php echo $row['bday'] ?>" required>
                      </div>
                
                      <div class="col-md-6">
                        <label><strong>Age</strong></label>
                        <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?php echo $row['age'] ?>" readonly required>
                      </div>
                
                <div class="col-md-12">
                <Label><b>Gender</b></label>
                <select name="gender" class="form-control" value="<?php echo $row['gender']?>">
<option disabled selected>Gender</option>
  <option value="Male"
              <?php
if($row['gender'] == 'Male'){
echo "selected";
}

?>
              
              >Male</option>
   <option value="Female"
               <?php
if($row['gender'] == 'Female'){
echo "selected";
}

?>
               >Female</option>
    </select>
                </div>
                <div class="col-md-6">
                        <label><strong>Cellphone Number</strong></label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $row['phone_num'] ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label><strong>Email Addess</strong></label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>
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
                        <div class="row">
                          <div class="col text-center">
                            <img src="../photo/<?php echo $row['photo']?>"height="255px"/>
                         <br> <br>
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
                    <select id="<?php echo "region".$i;?>" name="region" class="form-control">
                      <option value="<?php echo $row['regCode'] ?>"><?php echo $row['regDescr'] ?></option>
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
                  <select name="province" id="<?php echo "province".$i;?>" class="form-control">
                      <option value="<?php echo $row['provCode'] ?>"><?php echo $row['provDesc'] ?></option>
                      <?php
                        $province = "SELECT * FROM refprovince WHERE regCode = '".$row['regCode']."' ORDER BY id";
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
                  <select name="municipal" id="<?php echo "municipal".$i;?>" class="form-control">
                      <option value="<?php echo $row['citymunCode'] ?>"><?php echo $row['citymunDesc'] ?></option>
                      <?php
                        $municipal = "SELECT * FROM refcitymun WHERE provCode = '".$row['provCode']."' ORDER BY id";
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
                  <select name="brgy" id="<?php echo "brgy".$i;?>" class="form-control">
                      <option value="<?php echo $row['brgyCode'] ?>"><?php echo $row['brgyDesc'] ?></option>
                      <?php
                        $brgy = "SELECT * FROM refbrgy WHERE citymunCode = '".$row['citymunCode']."' ORDER BY id";
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



</div>
</div>

<!--ADDRESS END-->


</div><!--CENTER END-->

<!--left and right-->
<div class="row">
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h4">TOURIST SPOT TO MANAGE</div>
<div class="card-body">
<div class="row">

<div class="col-12">
<label><strong>Position/Designation</strong></label>
<input type="text" class="form-control" name="pos" placeholder="Position/Designation" value="<?php echo $row['pos']?>">
</div>

<div class="col">
<label><strong>Tourist Spot Name</strong></label>
<input type="text" class="form-control" name="tsn" placeholder="Tourist Spot Name" value="<?php echo $row['ts_name']?>">
</div>
</div>
</div>
</div>
</div>
<!--end lefty-->
<!--right-->
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h3">User Account</div>
  <div class="card-body">
    <div class="row">
      <label><strong>Username</strong></label>
      <div class="col-12">
        <input type="text" name="uname" id="" placeholder="Email" class="form-control" value="<?php echo $row['uname']?>" >
      </div>
      <label><strong>Enter New Password</strong></label>
      <div class="col-12">
        <input type="password" name="pass" placeholder="Enter New Password" class="form-control" id="pass5" required>
      </div>
      <div class="form-group">
      <div class="row">
        <div class="col d-flex justify-content-md-end">
        <label><input type="checkbox" class="mr-1" onclick="showPassword5();"><strong>Show Password</strong></label>
        </div>
      </div>
    </div>
    </div>

  </div>
</div>
</div>
<!--end right-->

</div>
<!--left and right end-->







    



    </div>
    <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-arrow-left"></i>Back</button>
      <button type="submit" name="edit" class="btn btn-flat btn-warning"><i class="fa fa-edit"></i>UPDATE</button>
      </form>
    </div>

  </div>
</div>
</div>

            





<!--SEARCH-->
<div class="modal fade" id="view<?php echo $row['tsm_id']?>" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Travelholic</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                 
    

            

                  <input type="hidden" name="tsm_id" value="<?php echo $row['tsm_id'] ?>">
                  <div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
                  <div class="row">
      <div class="col-sm-6">
           <div class="card bg-light mb-3" style="max-width: 50rem;">
            <div class="card-header h4">User's Information</div>
              <div class="card-body">
              <div class="row">
                  
                      <div class="col">
                        <label><strong>First Name</strong></label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $row['fname'] ?>" disabled>
                      </div>
              
                      <div class="col">
                        <label><strong>Last Name</strong></label>
                        <input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?php echo $row['lname'] ?>" disabled>
                      </div>

                
                      <div class="col-12">
                        <label><strong>Birthday</strong></label>
                        <input type="date" class="form-control" name="bday" placeholder="Tourist Spot Name" value="<?php echo $row['bday'] ?>" disabled>
                      </div>
                
                      <div class="col-6">
                        <label><strong>Age</strong></label>
                        <input type="text" class="form-control" name="age" placeholder="Age" value="<?php echo $row['age'] ?>" disabled>
                      </div>
                
                <div class="col">
                <Label><b>Gender</b></label>
                <select name="gender" class="form-control" value="<?php echo $row['gender']?>" disabled>
<option disabled selected>Gender</option>
  <option value="Male"
              <?php
if($row['gender'] == 'Male'){
echo "selected";
}

?>
              
              >Male</option>
   <option value="Female"
               <?php
if($row['gender'] == 'Female'){
echo "selected";
}

?>
               >Female</option>
    </select>
                </div>
                <div class="col-md-6">
                        <label><strong>Cellphone Number</strong></label>
                        <input type="number" class="form-control" name="phone" placeholder="Cellphone Number" value="<?php echo $row['phone_num'] ?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <label><strong>Email Addess</strong></label>
                        <input type="email" class="form-control" name="email" placeholder="Active Email Address"value="<?php echo $row['email'] ?>" readonly>
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
                        <div class="row">
                          <div class="col text-center">
                            <img src="../photo/<?php echo $row['photo']?>"height="251px"/>
                         <br> <br>
                           
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
<input type="text" class="form-control" name="street" placeholder="Reion" value="<?php echo $row['regDescr']?>" disabled>
</div>
<div class="col-md-3">
<Label><b>Province</b></label>
<input type="text" class="form-control" name="province" placeholder="Province" value="<?php echo $row['provDesc']?>"disabled>
</div>
<div class="col-md-3">
<Label><b>Municipality</b></label>
<input type="text" class="form-control" name="municipal" placeholder="Municipality" value="<?php echo $row['citymunDesc']?>"disabled>
</div>
<div class="col-md-3 text-dark">
<Label><b>Barangay</b></label>
<input type="text" class="form-control" name="brgy" placeholder="Barangay" value="<?php echo $row['brgyDesc']?>" disabled>
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
<div class="card-header h4">TOURIST SPOT TO MANAGE</div>
<div class="card-body">
<div class="row">

<div class="col-12">
<label><strong>Position/Designation</strong></label>
<input type="text" class="form-control" name="pos" placeholder="Position/Designation" value="<?php echo $row['pos']?>" disabled>
</div>

<div class="col">
<label><strong>Tourist Spot Name</strong></label>
<input type="text" class="form-control" name="tsn" placeholder="Tourist Spot Name" value="<?php echo $row['ts_name']?>" disabled>
</div>
</div>
</div>
</div>
</div>
<!--end lefty-->
<!--right-->
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h3">User Account</div>
  <div class="card-body">
    <div class="row">
      <label><strong>Username</strong></label>
      <div class="col-12">
        <input type="email" name="uname" id="" placeholder="Email" class="form-control" value="<?php echo $row['uname']?>" disabled>
      </div>
      <label><strong>Password</strong></label>
      <div class="col-12">
        <input type="password" name="pass" id="" placeholder="Password" class="form-control" value="<?php echo $row['pass']?>" disabled>
      </div>
    </div>

  </div>
</div>
</div>
<!--end right-->

</div>
<!--left and right end-->










    </div>
    <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-arrow-left"></i>Back</button>

    </div>
  </div>
</div>
</div>




  <!-- Modal DELETE -->
<div class="modal fade" id="delete<?php echo $row['tsm_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

              <input type="hidden" name="id" value="<?php echo $row['tsm_id']?>"/>
              Are your sure you want to Delete
              <strong><?php echo $row['fname']. ' '.$row['lname'];?>'s</strong>
            
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

<!--image update -->



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
              <img src="../photo/<?php echo $row['photo'] ?>" height="165px" width="200px"/> 
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
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img"><i class="fa fa-edit fa-sm"></i>Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!--###################################################### PROVINCIAL TOURISM #########################################-->

<!--view-->
<div class="modal fade" id="view<?php echo $row['pkpt_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">
       Add Provincial Tourism
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--VIEW_modal_BODY-->

        
<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="row">
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h4">Provincial Tourism Information</div>
<div class="card-body">
<div class="row">

    <div class="col">
      <label><strong>First Name</strong></label>
      <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $row['ptfname'] ?>"readonly>
    </div>

    <div class="col">
      <label><strong>Last Name</strong></label>
      <input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?php echo $row['ptlname'] ?>"readonly>
    </div>


    <div class="col-12">
      <label><strong>Birthday</strong></label>
      <input type="date" class="form-control" name="bday" placeholder="Tourist Spot Name" value="<?php echo $row['ptbday'] ?>"readonly>
    </div>

    <div class="col-6">
      <label><strong>Age</strong></label>
      <input type="text" class="form-control" name="age" placeholder="Age" value="<?php echo $row['ptage'] ?>"readonly>
    </div>

<div class="col">
<Label><b>Gender</b></label>
<input type="text" class="form-control" name="gender" placeholder="Gender" value="<?php echo $row['ptgender'] ?>"readonly>
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
      <div class="row">
        <div class="col text-center">
          <img src="../photo/<?php echo $row['img'] ?>"   id="imgDisplay" height="165px"/>
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
<Label><b>Region</b></label>
<input type="text" class="form-control" name="region" placeholder="region" value="<?php echo $row['regDescr']?>" disabled>
</div>
<div class="col-md-3">
<Label><b>Province</b></label>
<input type="text" class="form-control" name="province" placeholder="Province" value="<?php echo $row['provDesc']?>" disabled>
</div>
<div class="col-md-3">
<Label><b>Municipality</b></label>
<input type="text" class="form-control" name="municipal" placeholder="Municipality" value="<?php echo $row['citymunDesc']?>" disabled>
</div>
<div class="col-md-3 text-dark">
<Label><b>Barangay</b></label>
<input type="text" class="form-control" name="brgy" placeholder="Barangay" value="<?php echo $row['brgyDesc']?>" disabled>
</div>


</div>





</div>
</div>

<!--ADDRESS END-->
<!--User Account-->

<div class="row">
    <div class="col">
        <div class="card bg-light">
            <div class="card-header h4">
                User Account
            </div>
            <div class="card-body">
                <input type="hidden" name ="role" value="2">
                <label>Username</label>
                <input type="text" name="uname" class="form-control" placeholder="Username" value="<?php echo $row['uname'] ?>"readonly>
                <label>Password</label>
                <input type="password" name="pass" placeholder="Password" class="form-control" value="<?php echo $row['pass'] ?>"readonly>
            </div>
        </div>
    </div>
</div>

</div>
<!--left and right end-->

      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-arrow-left"></i> Back</button>
      </div>
    </div>
  </div>
</div>


<!--EDIT-->
<div class="modal fade" id="edit<?php echo $row['pkpt_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">
      Edit Tourist Manager
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--VIEW_modal_BODY-->

        
<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="row">
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h4">User's Information</div>
<div class="card-body">
<div class="row">
            <form action="includes/U_A_QUERY/update_pt.php" method="POST">
    <div class="col-md-6">
      <input type="hidden" name="pkpt_id" id=""value="<?php echo $row['pkpt_id'] ?>">
      <label><strong>First Name</strong></label>
      <input type="text" class="form-control" name="ptfname" placeholder="First Name" value="<?php echo $row['ptfname'] ?>">
    </div>

    <div class="col-md-6">
      <label><strong>Last Name</strong></label>
      <input type="text" class="form-control" name="ptlname" placeholder="Lastname" value="<?php echo $row['ptlname'] ?>">
    </div>


    <div class="col-md-6">
      <label><strong>Birthday</strong></label>
      <input type="date" class="form-control" name="ptbday" id="dob5" onblur="getAge5();" placeholder="Tourist Spot Name" value="<?php echo $row['ptbday'] ?>">
    </div>

    <div class="col-md-6">
      <label><strong>Age</strong></label>
      <input type="text" class="form-control" name="ptage" id="age5" placeholder="Age" value="<?php echo $row['ptage'] ?>" readonly required>
    </div>

<div class="col-md-12">
<Label><b>Gender</b></label>
            <select name="ptgender" class="form-control" value="<?php echo $row['ptgender'] ?>"  >
             
            <option value="Male"
              <?php
if($row['ptgender'] == 'Male'){
echo "selected";
}

?>
              
              >Male</option>
   <option value="Female"
               <?php
if($row['ptgender'] == 'Female'){
echo "selected";
}

?>
               >Female</option>
  
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
  <div class="card-header h3">User Image</div>
    <div class="card-body">
      <div class="row">
        <div class="col text-center">
          <img src="../photo/<?php echo $row['img'] ?>" class="mb-2 rounded-circle"  id="imgDisplay" height="165px" width="200px"/><br>
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
                      <option value="<?php echo $row['ptregCode'] ?>"><?php echo $row['regDescr'] ?></option>
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
                      <option value="<?php echo $row['ptprovCode'] ?>"><?php echo $row['provDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refprovince WHERE regCode = '".$row['ptregCode']."' ORDER BY id";
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
                      <option value="<?php echo $row['ptcitymunCode'] ?>"><?php echo $row['citymunDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refcitymun WHERE provCode = '".$row['ptprovCode']."' ORDER BY id";
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
                      <option value="<?php echo $row['ptbrgyCode'] ?>"><?php echo $row['brgyDesc'] ?></option>
                      <?php
                        $region = "SELECT * FROM refbrgy WHERE citymunCode = '".$row['ptcitymunCode']."' ORDER BY id";
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

<div class="row">
    <div class="col">
        <div class="card bg-light">
            <div class="card-header h4">
                User Account
            </div>
            <div class="card-body">
                <input type="hidden" name ="role" value="2">
                <label>Username</label>
                <input type="text" name="ptuname" class="form-control" placeholder="Username" value="<?php echo $row['uname'] ?>">
                <label>Password</label>
                <input type="password" name="ptpass" placeholder="Password" class="form-control" id="pass2" required>
            </div>
            <div class="form-group">
      <div class="row">
        <div class="col d-flex justify-content-md-end">
        <label><input type="checkbox" class="mr-1" onclick="showPassword2();"><strong>Show Password</strong></label>
        </div>
      </div>
    </div>
        </div>
    </div>
</div>

</div>
<!--left and right end-->



      </div>
      

      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
          <button type="submit" class="btn btn-warning btn-flat" name="edit"><i class="fa fa-edit"></i><strong>Update</strong></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--image update -->



<div class="modal fade" id="photo<?php echo $row['pkpt_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="includes/U_A_QUERY/update_pt_photo.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Profile</h4>
          </div>
        </div>
        <input type="hidden" name="pt_id" value="<?php echo $row['pkpt_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['img'] ?>" height="165px" width="200px"/> 
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-6">
              <input type="file" name="ptphoto" class="form-control">  
              </div>
            </div>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" class="btn btn-warning text-white" name="img"><i class="fa fa-edit"></i> <strong>Update</strong></button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--delete pt-->

<div class="modal fade" id="delete<?php echo $row['pkpt_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="includes/U_A_QUERY/delete_pt.php" method="POST">
        <input type="hidden" name="pt_id" value="<?php echo $row['pkpt_id'] ?>">
            
        <div class="row">
          <div class="col">
          Are you sure you want wo Delete <strong><?php echo $row['ptfname']. ' '.$row['ptlname']?>'s </strong> Record?
          </div>
        </div>      

    </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" class="btn btn-danger text-white" name="del"><i class="fa fa-trash"></i>Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
			function showPassword1(){
				var show = document.getElementById('pass1');
				if(show.type == 'password'){
					show.type='text';
				}else{
					show.type='password';
				}
			}

      function showPassword2(){
				var show1 = document.getElementById('pass2');
				if(show1.type == 'password'){
					show1.type='text';
				}else{
					show1.type='password';
				}
			}
	</script>