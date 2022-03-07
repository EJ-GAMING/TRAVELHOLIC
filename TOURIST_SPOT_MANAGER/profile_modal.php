
        <!-- VIEW PROFILE -->
        <form action="#" method="POST" >
<div class="modal fade" id="view_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col text-center">
          <img class="rounded-circle" src="../photo/<?php echo $user['photo']?>"height="150px" class="thumbnail"/>          </div>
      </div>
      <div class="row">
          <div class="col">
              <label>Fullname</label>
              <input type="text" name="fname" class="form-control" value="<?php echo $user['fname']. ' '. $user['lname'] ?>" readonly>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <label>Username</label>
              <input type="text" name="lname" class="form-control" value="<?php echo $user['uname'] ?>" readonly>
          </div>
      </div>    
      <div class="row">
          <div class="col">
              <label>Member Since</label>
              <input type="date" name="uname" class="form-control" value="<?php echo $user['created_at'] ?>" readonly>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <label>USER ID</label>
              <input type="text" name="uname" class="form-control" value="<?php echo $user['user_id'] ?>" readonly>
          </div>
      </div>
     
       
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
      </div>
          </form>
    </div>
  </div>
</div>




          <!--UPDATE PROFILE -->
          <form action="includes/UPDATE/update_profile.php" method="POST"  enctype="multipart/form-data">
<div class="modal fade" id="photo<?php echo $user['tsm_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
       
      </div>
      <div class="modal-body">
      <form action="includes/U_A_QUERY/update_pt_photo.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Profile</h4>
          </div>
        </div>
        <input type="hidden" name="tsm_id" value="<?php echo $user['tsm_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $user['photo']?>" onclick="triggerClick()"  id="profileDisplay" height="165px"/>
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-6">
              <input type="file" name="photo" onchange="displayImage(this)" id="profileImage">
              </div>
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" class="btn btn-warning text-white" name="edit"><i class="fa fa-edit"></i> Update</button> 
      </div>
          </form>
    </div>
  </div>
</div>


 <!--UPDATE img1 -->
 <form action="includes/UPDATE/update_ts_images.php" method="POST"  enctype="multipart/form-data">
<div class="modal fade" id="img1<?php echo $user['tsm_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
       
      </div>
      <div class="modal-body">
      <form action="includes/U_A_QUERY/update_pt_photo.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Image 1</h4>
          </div>
        </div>
        <input type="hidden" name="ts_id" value="<?php echo $user['tsinfo_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $ts['img1']?>" onclick="img1Click()"  id="img1Display" height="165px"/>
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-8">
              <input type="file" name="img1" onchange="img1Image(this)" id="img1" class="form-control bg-success text-white">
              </div>
            </div>

            <script>
              //img1
function img1Click(){
 document.querySelector('#img1').click();
}

function img1Image(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('#img1Display').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}
        </script>  
            </script>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" class="btn btn-warning text-white" name="img1"><i class="fa fa-edit"></i> Update</button> 
      </div>
          </form>
    </div>
  </div>
</div>





 <!--UPDATE img2 -->
 <form action="includes/UPDATE/update_ts_images.php" method="POST"  enctype="multipart/form-data">
<div class="modal fade" id="img2<?php echo $user['tsm_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
       
      </div>
      <div class="modal-body">
      <form action="includes/U_A_QUERY/update_pt_photo.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Image 2</h4>
          </div>
        </div>
        <input type="hidden" name="ts_id" value="<?php echo $ts['tsinfo_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $ts['img2']?>" onclick="img2Click()"  id="img2Display" height="165px"/>
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-8">
              <input type="file" name="img2" onchange="img2Image(this)" id="img2" class="form-control bg-success text-white">
              </div>
            </div>

            <script>
              //img2
function img2Click(){
 document.querySelector('#img2').click();
}

function img2Image(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('#img2Display').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}
        </script>  
            </script>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" class="btn btn-warning text-white" name="img2"><i class="fa fa-edit"></i> Update</button> 
      </div>
          </form>
    </div>
  </div>
</div>



 <!--UPDATE img3 -->
 <form action="includes/UPDATE/update_ts_images.php" method="POST"  enctype="multipart/form-data">
<div class="modal fade" id="img3<?php echo $user['tsm_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
       
      </div>
      <div class="modal-body">
      <form action="includes/U_A_QUERY/update_pt_photo.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Image 3</h4>
          </div>
        </div>
        <input type="hidden" name="ts_id" value="<?php echo $user['tsinfo_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $ts['img3']?>" onclick="img3Click()"  id="img3Display" height="165px"/>
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-8">
              <input type="file" name="img3" onchange="img3Image(this)" id="img3" class="form-control bg-success text-white">
              </div>
            </div>

            <script>
              //img1
function img3Click(){
 document.querySelector('#img3').click();
}

function img3Image(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('#img3Display').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}
        </script>  
            </script>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" class="btn btn-warning text-white" name="img3"><i class="fa fa-edit"></i> Update</button> 
      </div>
          </form>
    </div>
  </div>
</div>



 <!--UPDATE img4 -->
 <form action="includes/UPDATE/update_ts_images.php" method="POST"  enctype="multipart/form-data">
<div class="modal fade" id="img4<?php echo $ts['tsm_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
       
      </div>
      <div class="modal-body">
      <form action="includes/U_A_QUERY/update_pt_photo.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Image 4</h4>
          </div>
        </div>
        <input type="hidden" name="ts_id" value="<?php echo $user['tsinfo_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $ts['img4']?>" onclick="img4Click()"  id="img4Display" height="165px"/>
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-8">
              <input type="file" name="img4" onchange="img4Image(this)" id="img4" class="form-control bg-success text-white">
              </div>
            </div>

            <script>
              //img1
function img4Click(){
 document.querySelector('#img4').click();
}

function img4Image(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('#img4Display').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}
        </script>  
            </script>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" class="btn btn-warning text-white" name="img4"><i class="fa fa-edit"></i> Update</button> 
      </div>
          </form>
    </div>
  </div>
</div>


<!--Update Account-->


<div class="modal fade" id="update_account" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="includes/UPDATE/update.php" method="POST" enctype="multipart/form-data">
      <div class="row mb-4">
          <div class="col text-center">
            <span class="h3 text-center">Update Account</span>
          </div>
        </div>
    <div class="form-group row">
        <br><br>
    <label for="fname" class="col-sm-2 col-form-label"><strong>Fullname</strong></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" Value="<?php echo $user['fname']. ' '.$user['lname'];?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="uname" class="col-sm-2 col-form-label"><strong> Username</strong></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="uname" id="uname" placeholder="Last Name" Value="<?php echo $user['uname'];?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="pass" class="col-sm-2 col-form-label"><strong>New Password</strong></label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pass" id="pass1" placeholder="Enter your New Password" required>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col d-flex justify-content-md-end">
        <label><input type="checkbox" class="mr-1" onclick="showPassword1();"><strong>Show Password</strong></label>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="form-group row">
    <label for="current" class="col-sm-2 col-form-label"><strong>Current Password</strong></label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="cur_pass" id="pass2" placeholder="Enter Your Current Password to Save Changes" required>
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
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> <strong>Cancel</strong></button>
        <button type="submit" class="btn btn-warning" name="update"><i class="fa fa-edit"></i> <strong>Update</strong></button>
      </div>
          </form>
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