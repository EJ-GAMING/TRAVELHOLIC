



<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title" id="exampleModalLabel">
            Add Provincial Tourism
            <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </h5>
       
      </div>
      <div class="modal-body">
        
<form method="post" action="includes/U_A_QUERY/insert_pt.php" enctype="multipart/form-data">

<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="row">
<div class="col-sm-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h4">User's Information</div>
<div class="card-body">
<div class="row">

    <div class="col-md-6">
      <label><strong>First Name</strong></label>
      <input type="text" class="form-control" name="fname" placeholder="First Name" required>
    </div>

    <div class="col-md-6">
      <label><strong>Last Name</strong></label>
      <input type="text" class="form-control" name="lname" placeholder="Lastname" required>
    </div>


    <div class="col-md-6">
      <label><strong>Birthday</strong></label>
      <input type="date" class="form-control" name="bday" id="dob3" onblur="getAge3();"  placeholder="Tourist Spot Name" required>
    </div>

    <div class="col-md-6">
      <label><strong>Age</strong></label>
      <input type="text" class="form-control" name="age" id="age3" placeholder="Age" readonly required>
    </div>

<div class="col-md-12">
<Label><b>Gender</b></label>
            <select name="gender" class="form-control" value="#"  required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
</div>
<div class="col-md-6">
      <label><strong>Email Address</strong></label>
      <input type="text" class="form-control" name="email"  placeholder="Email Address" required>
    </div>
    <div class="col-md-6">
      <label><strong>Contact Number</strong></label>
      <input type="text" class="form-control" name="num" placeholder="Contact Number" required>
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
          <img src="assets/img/placeholderr.png" onclick="btnClicked()"  id="imgDisplay" height="165px"/>
          <label for="profileImage"><strong>User Profile</strong></label>
          <input type="file" name="photo" onchange="showImage(this)" id="imgProfile" style="display:none;">
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
    <option value="" class="text-center" disabled selected>Select Region</option>
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
    <option value="" class="text-center" selected>Select Region First</option>
  </select>                  
</div>
<div class="col-md-3">
<Label><b>Municipality</b></label>
<select name="municipal" id="municipal2" class="form-control" required>
    <option value="" class="text-center" disabled selected>Select Province First</option>
  </select>                  
</div>
<div class="col-md-3">
<Label><b>Barangay</b></label>
<select name="brgy" id="brgy2" class="form-control" required>
    <option value="" class="text-center" disabled selected>Select Municipal First</option>
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
                <input type="text" name="uname" class="form-control" placeholder="Username">
                <label>Password</label>
                <input type="password" name="pass" placeholder="Password" class="form-control" required>
            </div>
        </div>
    </div>
</div>

</div>
<!--left and right end-->

<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
<input type="submit" name="insert" class="btn btn-flat btn-primary" value="Save"/>
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
       
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
</div>