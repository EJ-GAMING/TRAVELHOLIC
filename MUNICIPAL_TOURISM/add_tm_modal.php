



<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">
       Add Tourist Manager
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



            
                       
      <form method="post" action="includes/U_A_QUERY/insert.php" enctype="multipart/form-data">

<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="row">
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h4">User's Information</div>
<div class="card-body">
<div class="row">

    <div class="col-md-6">
      <input type="hidden" name="" id="" value="<?php echo $row['tsinfo_id'] ?>">
      <label><strong>First Name</strong></label>
      <input type="text" class="form-control" name="fname" placeholder="First Name" required>
    </div>

    <div class="col-md-6">
      <label><strong>Last Name</strong></label>
      <input type="text" class="form-control" name="lname" placeholder="Lastname" required>
    </div>


    <div class="col-md-6">
      <label><strong>Birthday</strong></label>
      <input type="date" class="form-control" name="bday" id="dob1" onblur="getAge1();" placeholder="Birthdate" required>
    </div>

    <div class="col-md-6">
      <label><strong>Age</strong></label>
      <input type="number" class="form-control" name="age" id="age1" placeholder="Age" readonly required>
    </div>

<div class="col-md-12">
            <Label><b>Gender</b></label>
            <select name="gender" class="form-control" value="#"  required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
</div>
<div class="col-md-6">
      <label><strong>Cellphone Number</strong></label>
      <input type="number" class="form-control" name="phone" placeholder="Cellphone Number" required>
    </div>
    <div class="col-md-6">
      <label><strong>Email Addess</strong></label>
      <input type="email" class="form-control" name="email" placeholder="Active Email Address" required>
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
          <img src="assets/img/placeholderr.png" onclick="triggerClick()"  id="profileDisplay" height="233px"/>
          <label for="profileImage"><strong>User Profile</strong></label>
          <input type="file" name="user_img" onchange="displayImage(this)" id="profileImage" class="btn btn-secondary">
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
  <select id="region2" name="region" class="form-control" required>
    <option value=""disabled selected>Select Region</option>
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
<select name="province" id="province2" class="form-control" required>
    <option value=""disabled selected>Select Region First</option>
  </select>                  
</div>
<div class="col-md-3">
<Label><b>Municipality</b></label>
<select name="municipal" id="municipal2" class="form-control" required>
    <option value=""disabled selected>Select Province First</option>
  </select>                  
</div>
<div class="col-md-3">
<Label><b>Barangay</b></label>
<select name="brgy" id="brgy2" class="form-control" required>
    <option value=""disabled selected>Select Municipal First</option>
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
<input type="text" class="form-control" name="pos" placeholder="Position/Designation" required>
</div>

<div class="col">
<label><strong>Tourist Spot Name</strong></label>
<select class="form-control" name="tsn" required>
  <option disabled selected>Tourist Spot Name</option>
  <?php 
  $mun = $user['mtm'];
  $sql ="SELECT * FROM tbl_ts_info 
INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
WHERE tscitymunCode = '$mun'

ORDER BY tbl_ts_info.tsinfo_id DESC ";
        $query = mysqli_query($conn, $sql);
        while ($fetch = mysqli_fetch_assoc($query)) {
         echo " 
         <option value='".$fetch['tsinfo_id']."'>".$fetch['ts_name']."</option>
         ";
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
  <div class="card-header h3">User Account</div>
    <div class="card-body">
      <div class="row">
        <input type="hidden" name="role" value="1"/>
        <label><strong>Username</strong></label>
        <div class="col-12">
          <input type="text" name="uname" id="" placeholder="Username" class="form-control" required>
        </div>
        <label><strong>Password</strong></label>
        <div class="col-12">
          <input type="password" name="pass" id="" placeholder="Password" class="form-control" required>
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
      <button type="submit" name="save" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Save</button>
      </form>
      </div>
    </div>
  </div>
</div>
