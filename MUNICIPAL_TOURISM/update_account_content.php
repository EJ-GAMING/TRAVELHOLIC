    
<form method="post" action="includes/UPDATE/update_query.php" enctype="multipart/form-data">

<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="row">
<div class="col-md-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h4">User's Information</div>
<div class="card-body">
<div class="row">
  <input type="hidden" name="mt_id" value="<?php echo $user['pkmt_id']?>">

    <div class="col-md">
      <label><strong>First Name</strong></label>
      <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $user['mt_fname'] ?>"required readonly>
    </div>

    <div class="col-md">
      <label><strong>Last Name</strong></label>
      <input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?php echo $user['mt_lname'] ?>"required readonly>
    </div>


    <div class="col-12">
      <label><strong>Birthday</strong></label>
      <input type="date" class="form-control" name="bday" id="dob1" onblur="getAge1();" placeholder="Tourist Spot Name" value="<?php echo $user['mt_bday'] ?>"required readonly>
    </div>
                  <div class="col-md-6">
                        <label><strong>Age</strong></label>
                        <input type="text" class="form-control" name="age" id="age1" placeholder="Age" value="<?php echo $user['mt_age'] ?>" required readonly>
                      </div>

<div class="col">
<Label><b>Gender</b></label>
<select name="gender" class="form-control" value="<?php echo $row['mt_gender']?>" required readonly>
<option disabled selected>Gender</option>
  <option value="Male"
              <?php
if($user['mt_gender'] == 'Male'){
echo "selected";
}

?>
              
              >Male</option>
   <option value="Female"
               <?php
if($user['mt_gender'] == 'Female'){
echo "selected";
}

?>
               >Female</option>
    </select>
</div>
<div class="col-6">
      <label><strong>Email Address</strong></label>
      <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo $user['mt_email'] ?>"required >
    </div>
    <div class="col-6">
      <label><strong>Contact Number</strong></label>
      <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="<?php echo $user['mt_contact'] ?>"required>
    </div>
    <div class="col-md-12">
      <label><strong>Municipal to Manage</strong></label>
      <input type="text" class="form-control" name="mtm" placeholder="Municipal to Manage" value="<?php echo $user['citymunDesc'] ?>" required readonly>
    </div>
</div>
</div>
</div>
</div>
<!--end lefty-->
<!--right-->
<div class="col-md-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
  <div class="card-header h3">User Image</div>
    <div class="card-body">
      <div class="row mb-2">
        <div class="col text-center">
          <img src="../photo/municipal/<?php echo $user['photo'] ?>" height="300px" width="220px"/>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <a href="#" class="btn btn-warning btn-flat text-dark text-center form-control" data-bs-toggle="modal" data-bs-target="#img<?php echo $user['pkmt_id']?>">
          <i class="fa fa-edit"></i> <strong>Edit</strong> </a>
        </div>
      </div>

    </div>
</div>
</div>
<!--end right-->

</div>
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
      
      <script>
             function getAge1(){
                var dob = document.getElementById('dob1').value;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('age1').value=age;
            }
        </script>