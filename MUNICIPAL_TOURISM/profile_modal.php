
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
          <img class="rounded-circle" src="../photo/municipal/<?php echo $user['photo']?>"height="150px" class="thumbnail"/>          </div>
      </div>
      <div class="row">
          <div class="col">
              <label>Fullname</label>
              <input type="text" name="fname" class="form-control" value="<?php echo $user['mt_fname']. ' '.$user['mt_lname'] ?>" readonly>
          </div>
      </div>  
      <div class="row">
          <div class="col">
              <label>Username</label>
              <input type="text" name="uname" class="form-control" value="<?php echo $user['mt_username'] ?>" readonly>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <label>Member Since</label>
              <input type="text" name="uname" class="form-control" value="<?php echo $user['created'] ?>" readonly>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> <strong>Cancel</strong></button>
      </div>
          </form>
    </div>
  </div>
</div>



<!--update profile-->

<div class="modal fade" id="img<?php echo $user['pkmt_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="includes/UPDATE/update_profile.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center"> Update Profile</h4>
          </div>
        </div>
        <input type="hidden" name="mt_id" value="<?php echo $user['pkmt_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/municipal/<?php echo $user['photo'] ?>" height="165px" width="200px"/> 
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-6">
              <input type="file" name="mtphoto" class="form-control">  
              </div>
            </div>
       
      </div>
      <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> <strong>Cancel</strong></button>
        <button type="submit" class="btn btn-warning" name="edit"><i class="fa fa-edit"></i> <strong>Update</strong></button>
      </div>
          </form>
    </div>
  </div>
</div>


<!--update Account-->

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
      <form action="includes/UPDATE/update_account.php" method="POST" enctype="multipart/form-data">
      <div class="row mb-4">
          <div class="col text-center">
            <span class="h3 text-center">Update Account</span>
          </div>
        </div>
    <div class="form-group row">
        <br><br>
        <input type="hidden" name="pkmt_id" value="<?php echo $user['pkmt_id']?>">
    <label for="fname" class="col-sm-2 col-form-label"><strong>Fullname</strong></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" Value="<?php echo $user['mt_fname']. ' '.$user['mt_lname'];?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="uname" class="col-sm-2 col-form-label"><strong> Username</strong></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="uname" id="uname" placeholder="Username" Value="<?php echo $user['mt_username'];?>">
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