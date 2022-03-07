



<div class="modal fade" id="mt_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title" id="exampleModalLabel">
            Add Municipal Tourism
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<form method="post" action="includes/mt_QUERY/insert.php" enctype="multipart/form-data">

<div class="col justify-content-center"><!--TO MAKE IT CENTER-->
<div class="row">
<div class="col-md-6">
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
<div class="col-md-6">
<div class="card bg-light mb-3" style="max-width: 80rem;">
  <div class="card-header h3">User Image</div>
    <div class="card-body">
      <div class="row">
        <div class="col text-center">
          <img src="assets/img/placeholderr.png" onclick="btnClicked()"  id="imgDisplay" height="273px"/>
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



        


<!--User Account-->

<div class="row">
    <div class="col">
        <div class="card bg-light">
            <div class="card-header h4">
                User Account
            </div>
            <div class="card-body">
                 <?php 
                    $prov = $user['ptprovCode'];
                    $region = $user['ptregCode'];
                    ?>
                    <input type="hidden" name="prov" value="<?php echo $prov;?>">
                    <input type="hidden" name="region" value="<?php echo $region;?>">

                <label>Municipal to Manage</label>
                <select name="mtm" id="municipal" class="form-control">
                  <option value=""disabled selected>Select Municipal to Manage</option>
                      <?php
                        $region = "SELECT * FROM refcitymun WHERE provCode = '$prov' ORDER BY id";
                        $region_result = mysqli_query($conn, $region);
                          while ($row1 = mysqli_fetch_assoc($region_result)) {
                            echo " 
                                  <option value='".$row1['citymunCode']."'>".$row1['citymunDesc']."</option>
                                  ";
                          }
                      ?>
                    </select> 
                                     <label>Username</label>
                <input type="text" name="uname" class="form-control" placeholder="Username">
                <label>Password</label>
                <input type="password" name="pass" placeholder="Password" id="pass1" class="form-control" required>
            </div>
            <div class="form-group">
      <div class="row">
        <div class="col d-flex justify-content-md-end">
        <label><input type="checkbox" class="mr-1" onclick="showPassword1();"><strong>Show Password</strong></label>
        </div>
      </div>
    </div>
        </div>
    </div>
</div>

</div>
<!--left and right end-->


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
                         
            function getAge3(){
                var dob = document.getElementById('dob3').value;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('age3').value=age;
            }
                    </script> 
                    
<script type="text/javascript">
			function showPassword1(){
				var show = document.getElementById('pass1');
				if(show.type == 'password'){
					show.type='text';
				}else{
					show.type='password';
				}
			}

     
	</script>
       
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" name="insert" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Save</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- VIEW -->



<div class="modal fade" id="view<?php echo $row['pkmt_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">
       View Municipal Tourism <?php echo $count?>
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--VIEW_modal_BODY-->

        
<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="row">
<div class="col-md-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h4">Provincial Tourism Information</div>
<div class="card-body">
<div class="row">

    <div class="col">
      <label><strong>First Name</strong></label>
      <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $row['mt_fname'] ?>"readonly>
    </div>

    <div class="col">
      <label><strong>Last Name</strong></label>
      <input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?php echo $row['mt_lname'] ?>"readonly>
    </div>


    <div class="col-12">
      <label><strong>Birthday</strong></label>
      <input type="date" class="form-control" name="bday" placeholder="Tourist Spot Name" value="<?php echo $row['mt_bday'] ?>"readonly>
    </div>

    <div class="col-6">
      <label><strong>Age</strong></label>
      <input type="text" class="form-control" name="age" placeholder="Age" value="<?php echo $row['mt_age'] ?>"readonly>
    </div>

<div class="col">
<Label><b>Gender</b></label>
<input type="text" class="form-control" name="gender" placeholder="Gender" value="<?php echo $row['mt_gender'] ?>"readonly>
</div>
<div class="col-6">
      <label><strong>Email Address</strong></label>
      <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo $row['mt_email'] ?>"readonly>
    </div> <div class="col-6">
      <label><strong>Contact Number</strong></label>
      <input type="text" class="form-control" name="age" placeholder="Age" value="<?php echo $row['mt_contact'] ?>"readonly>
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
      <div class="row">
        <div class="col text-center">
          <img src="../photo/municipal/<?php echo $row['photo'] ?>"   id="imgDisplay" height="165px"/>
        </div>
        
      </div>

    </div>
</div>
</div>
<!--end right-->

</div>
<!--left and right end-->



        

<!--User Account-->

<div class="row">
    <div class="col">
        <div class="card bg-light">
            <div class="card-header h4">
                User Account
            </div>
            <div class="card-body">
                <label>Municipal to Manage</label>
                <input type="text" class="form-control" placeholder="Username" value="<?php echo $row['citymunDesc'] ?>"readonly>
                <label>Username</label>
                <input type="text" name="uname" class="form-control" placeholder="Username" value="<?php echo $row['mt_username'] ?>"readonly>
                <label>Enter New Password</label>
                <input type="password" name="pass" placeholder="Password" class="form-control" value="<?php echo $row['mt_password'] ?>"readonly>
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
<div class="modal fade" id="edit<?php echo $row['pkmt_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">
      Update Municipal Tourism
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--VIEW_modal_BODY-->

        
<div class="col  justify-content-center"><!--TO MAKE IT CENTER-->
<div class="row">
<div class="col-md-6">
<div class="card bg-light mb-3" style="max-width: 50rem;">
<div class="card-header h4">User's Information</div>
<div class="card-body">
<div class="row">
            <form action="includes/MT_QUERY/update.php" method="POST">
    <div class="col-md-6">
      <input type="hidden" name="pkmt_id" id=""value="<?php echo $row['pkmt_id'] ?>">
      <label><strong>First Name</strong></label>
      <input type="text" class="form-control" name="mt_fname" placeholder="First Name" value="<?php echo $row['mt_fname'] ?>">
    </div>

    <div class="col-md-6">
      <label><strong>Last Name</strong></label>
      <input type="text" class="form-control" name="mt_lname" placeholder="Lastname" value="<?php echo $row['mt_lname'] ?>">
    </div>


    <div class="col-md-6">
      <label><strong>Birthday</strong></label>
      <input type="date" class="form-control" name="mt_bday" id="dob5" onblur="getAge5();"  value="<?php echo $row['mt_bday'] ?>">
    </div>

    <div class="col-md-6">
      <label><strong>Age</strong></label>
      <input type="text" class="form-control" name="mt_age" id="age5" placeholder="Age" value="<?php echo $row['mt_age'] ?>" readonly required>
    </div>

<div class="col-md-12">
<Label><b>Gender</b></label>
            <select name="mt_gender" class="form-control" value="<?php echo $row['mt_gender'] ?>"  >
             
            <option value="Male"
              <?php
if($row['mt_gender'] == 'Male'){
echo "selected";
}

?>
              
              >Male</option>
   <option value="Female"
               <?php
if($row['mt_gender'] == 'Female'){
echo "selected";
}

?>
               >Female</option>
  
            </select>
</div>

<div class="col-md-6">
      <label><strong>Email Address</strong></label>
      <input type="text" class="form-control" name="mt_email" placeholder="Email Address" value="<?php echo $row['mt_email'] ?>" required>
    </div>
    <div class="col-md-6">
      <label><strong>Contact Number</strong></label>
      <input type="text" class="form-control" name="mt_contact" placeholder="Phone Number" value="<?php echo $row['mt_contact'] ?>" required>
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
      <div class="row">
        <div class="col text-center">
          <img src="../photo/municipal/<?php echo $row['photo'] ?>" class="mb-2 rounded-circle"  id="imgDisplay" height="165px" width="200px"/><br>
        </div>
        
      </div>

    </div>
</div>
</div>
<!--end right-->

</div>
<!--left and right end-->

        

<!--User Account-->

<div class="row">
    <div class="col">
        <div class="card bg-light">
            <div class="card-header h4">
                User Account
            </div>
            <div class="card-body">
            <label>Municipal To Manage</label>
            <input type="hidden" name="prov" value="<?php echo $prov;?>">
            <select name="mtm" id="municipal3" class="form-control">
              <option value="<?php echo $row['citymunCode'] ?>"><?php echo $row['citymunDesc'] ?></option>                      <?php
                        $mun = "SELECT * FROM refcitymun WHERE provCode = '$prov' ORDER BY id";
                        $region_result = mysqli_query($conn, $region);
                          while ($row1 = mysqli_fetch_assoc($region_result)) {
                            echo " 
                                  <option value='".$row1['citymunCode']."'>".$row1['citymunDesc']."</option>
                                  ";
                          }
                      ?>
                    </select> 

            <label>Username</label>
                <input type="text" name="mt_uname" class="form-control" placeholder="Username" value="<?php echo $row['mt_username'] ?>">
                <label>Password</label>
                <input type="password" name="mt_pass" placeholder="Password" class="form-control" id="<?php echo 'pass'.$i;?>" required>
            </div>
            <div class="form-group">
      <div class="row">
        <div class="col d-flex justify-content-md-end">
        <label><input type="checkbox" class="mr-1" onclick="<?php echo 'showPassword'.$i.'()'?>"><strong>Show Password</strong></label>
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
          <button type="submit" class="btn btn-warning btn-flat" name="update"><i class="fa fa-edit"></i><strong>Update</strong></button>
        </form>
      </div>
    </div>
  </div>
</div>


<!--DELETE-->

<div class="modal fade" id="delete<?php echo $row['pkmt_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="includes/MT_QUERY/delete.php" method="POST">
        <input type="hidden" name="mt_id" value="<?php echo $row['pkmt_id'] ?>">
            
        <div class="row">
          <div class="col">
          Are you sure you want wo Delete <strong><?php echo $row['mt_fname']. ' '.$row['mt_lname']?>'s </strong> Record?
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


<!--image update -->



<div class="modal fade" id="photo<?php echo $row['pkmt_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="includes/MT_QUERY/profile_update.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <h4 class="text-center">Update Profile</h4>
          </div>
        </div>
        <input type="hidden" name="mt_id" value="<?php echo $row['pkmt_id'] ?>">
            <div class="row">
              <div class="col d-flex justify-content-center">
              <img src="../photo/municipal/<?php echo $row['photo'] ?>" height="165px" width="200px"/> 
            </div>
            </div>
            <div class="row d-flex justify-content-center mt-1">
              <div class="col-md-6">
              <input type="file" name="mtphoto" class="form-control">  
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

<script>
                        function <?php echo 'showPassword'.$i."()"?>{
				            var show1 = document.getElementById('<?php echo "pass".$i;?>');
				                if(show1.type == 'password'){
					                show1.type='text';
				                }else{
					                show1.type='password';
				                }
			            }
                    </script>

                    
     