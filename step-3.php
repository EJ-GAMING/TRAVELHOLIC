<?php 
include_once 'includes/DB/connection.php';

session_start();//start session if session not start

if(isset($_SESSION['com'])){
    $tsm_id = $_SESSION['tsm_id'];
    $query = "SELECT *
    FROM tbl_ts_manager
    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
    INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
    INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
    INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
    INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
    INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
    
    WHERE tbl_ts_manager.tsm_id = '$tsm_id'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.reboot.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script type="text/javascript"> 
function disableselect(e){  
return false  
}  

function reEnable(){  
return true  
}  

//if IE4+  
document.onselectstart=new Function ("return false")  
document.oncontextmenu=new Function ("return false")  
//if NS6  
if (window.sidebar){  
document.onmousedown=disableselect  
document.onclick=reEnable  
}
</script>
    <title>Travelholic</title>
</head>
<body class="bg-light">

<?php include_once 'navbar.php'?>


<!--container-->
<div class="container">
<div class="row d-flex justify-content-center mt-3">
           <div class="col-md-8 h3 text-center">
              <?php include_once 'includes/msg.php';?>
           </div>
       </div>    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
        <div class="alert alert-warning alert-dismissible fade show text-dark" role="alert">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Message!</strong> Please review your Booking information.
			    You cannot change your reservation once you proceed.<br>
                And Please Insert <strong>Actual Picture</strong> And  <strong>Valid ID</strong> to be Approved.
        </div>
        </div>
    </div>
    <div class="row mb-2">
                            <div class="col-md">
                                <a href="step-2.php?ts_id=<?php echo $row['tsm_id'] ?>" class="btn btn-flat"><i class="fa fa-arrow-left fa-lg"></i></a>
                            </div>
                        </div>
                        <form action="includes/add_tourist.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-header bg-success h3 text-white text-center">Please Fill Up This Form In Order to Book</div>
                                    </div>
                                </div>
                            </div>
        <div class="row ">
            <div class="col-md">
               <div class="card mt-3">
                   <div class="card-header bg-success text-light h4">Booked Information</div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Tourist Spot You Booked:</label>
                                <input type="text" name="ts_name" readonly value="<?php echo $row['ts_name'] ?>" class="form-control">
                                <input type="hidden" name="tsm_id" value="<?php echo $_SESSION['tsm_id'] ?>">                    
                            </div>
                            <div class="col-md-2">
                                <label  class="h6">Number of Pax</label>
                                <input type="text" name="com_num" readonly value="<?php echo $_SESSION['com'] ?>" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label  class="h6">Date of Booking</label>
                                <input type="date" name="date_book" readonly value="<?php echo $_SESSION['b_date'] ?>" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label  class="h6">Date of Check Out</label>
                                <input type="date" name="date_out" readonly value="<?php echo $_SESSION['b_out'] ?>" class="form-control">
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header bg-success text-light h4">Tourist Information</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>First Name</strong></label>
                                        <input type="text" name="fname" class="form-control" placeholder="ex. John" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Lastname Name</strong></label>
                                        <input type="text" name="lname" class="form-control" placeholder="ex. Doe" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>Birthdate</strong></label>
                                        <input type="date" name="bday" id="dob" class="form-control" onblur="getAge();" placeholder="Firstname" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Age</strong></label>
                                        <input type="text" name="age" id="age" class="form-control" placeholder="Age" required readonly>
                                    </div>
                                   
                                </div>
                               <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label><strong>Gender</strong></label>
                                        <select name="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Nationality</strong></label>
                                        <input type="text" name="nationality" placeholder="Nationality" class="form-control">
                                    </div>
                               </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for=""><strong>Phone Number</strong></label>
                                        <input type="number" name="phone" class="form-control" placeholder="ex.09123456789" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><strong>Email Address</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="ex.johndoe@gmail.com" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header bg-success text-light h4">Tourist Image</div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-4 mb-2">
                                        <div class="card">
                                            <div class="card-header bg-success text-light h6 text-center">Tourist Image</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="assets/img/placeholder.png" class="rounded-circle" height="163px" width="150px" onclick="triggerClick()"  id="profileDisplay">
                                                    </div>
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md">
                                                            <input type="file" name="user_img" onchange="displayImage(this)" id="profileImage" class="form-control" required>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-success text-light h6 text-center">VALID ID</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="assets/img/placeholder.png" class="rounded-circle" height="163px" width="150px" onclick="idClicked()"  id="idDisplay">
                                                    </div>                                                    
                                                </div>
                                                <div class="row d-flex justify-content-center">
                                                        <div class="col-md">
                                                        <input type="file" name="valid_id" onchange="displayId(this)" id="idImage" class="form-control "  required>
                                                        </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="card">
                                            <div class="card-header bg-success text-light h6 text-center">Additional Requirements Document</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="assets/img/placeholder.png" height="163px" width="300px" onclick="triggered()"  id="vacDisplay">
                                                    </div>
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md">
                                                            <input type="file" name="vac" onchange="displayVac(this)" id="vacImage" class="form-control" required>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header bg-success text-light h4">Tourist Address</div>
                        <div class="card-body">
                            
<div class="row">
<div class="col-md-3">
<Label><b>REGION</b></label>
  <select id="region" name="region" class="form-control" required>
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
<select name="province" id="province" class="form-control" required>
    <option value=""disabled selected>Select Region First</option>
  </select>                  
</div>
<div class="col-md-3">
<Label><b>Municipality</b></label>
<select name="municipal" id="municipal" class="form-control" required>
    <option value=""disabled selected>Select Province First</option>
  </select>                  
</div>
<div class="col-md-3">
<Label><b>Barangay</b></label>
<select name="brgy" id="brgy" class="form-control" required>
    <option value=""disabled selected>Select Municipal First</option>
  </select>                  
</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
           
            <!--############################################################ companions #######################################################################################-->
            <div class="row mt-3 mb-3">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header bg-success h3 text-center text-light">COMPANION'S INFORMATION</div>
                    </div>
                </div>
            </div>
           
        
            <?php 
                $com = $_SESSION['com'] - 1;
                if ($com <= 0) {
                   echo 'NO COMPANIONS';
                }else {
                    
							
					 	$count = 1;
					 	for($i = 0; $i < $com; $i++){
                             $_SESSION['inc'] = $count;		?>

<script src="js/jquery.min.js"></script>
<?php include_once 'address.php';?>

              

        <div class="row">
            <div class="col-md">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header h4 bg-success text-light">Tourist Information(<?= $count ?>)</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>First Name(<?= $count ?>)</strong></label>
                                        <input type="text" name="<?php echo $i. 'com_fname'?>" class="form-control" placeholder="ex. John" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Lastname Name(<?= $count ?>)</strong></label>
                                        <input type="text" name="<?php echo $i. 'com_lname'?>" class="form-control" placeholder="ex. Doe" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><strong>Birthdate(<?= $count ?>)</strong></label>
                                        <input type="date" name="<?php echo $i. 'com_dob'?>" id="<?php echo "dob".$i;?>" class="form-control" onblur="<?php echo "getAge".$i."()";?>;" placeholder="Firstname" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Age(<?= $count ?>)</strong></label>
                                        <input type="text" name="<?php echo $i. 'com_age'?>" id="<?php echo "age".$i;?>" class="form-control" placeholder="Age" required readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Gender(<?= $count ?>)</strong></label>
                                        <select name="<?php echo $i. 'com_gender'?>" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Other</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="">Phone Number(<?= $count ?>)</label>
                                        <input type="number" name="<?php echo $i. 'com_phone'?>" class="form-control" placeholder="ex.09123456789" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email Address(<?= $count ?>)</label>
                                        <input type="email" name="<?php echo $i. 'com_email'?>" class="form-control" placeholder="ex.johndoe@gmail.com" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header h4 bg-success text-light">Tourist Image(<?= $count ?>)</div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-4 mb-2">
                                        <div class="card">
                                            <div class="card-header text-center bg-success text-light h6">Tourist Image(<?= $count ?>)</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="assets/img/placeholder.png" class="rounded-circle" height="163px" width="150px" onclick="<?php echo "triggerClick".$i;?>()"  id="<?php echo "profileDisplay".$i;?>">
                                                    </div>
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md">
                                                            <input type="file" name="<?php echo $i. 'com_user_img'?>" onchange="<?php echo "displayImagee".$i;?>(this)" id="<?php echo "profileImage".$i;?>" class="form-control" required>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-success text-light h6 text-center">VALID ID(<?= $count ?>)</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="assets/img/placeholder.png" class="rounded-circle" height="163px" width="150px" onclick="<?php echo "idClicked".$i;?>()"  id="<?php echo "idDisplay".$i;?>">
                                                    </div>                                                    
                                                </div>
                                                <div class="row d-flex justify-content-center">
                                                        <div class="col-md">
                                                        <input type="file" name="<?php echo $i. 'com_valid_id'?>" onchange="<?php echo "displayId".$i;?>(this)" id="<?php echo "idImage".$i;?>" class="form-control "  required>
                                                        </div>
                                                    </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="card">
                                            <div class="card-header bg-success text-light h6 text-center">Additional Requirements Document(<?= $count ?>)</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="assets/img/placeholder.png" height="163px" width="300px" onclick="<?php echo "triggered".$i;?>()"  id="<?php echo "vacDisplay".$i;?>">
                                                    </div>
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md">
                                                            <input type="file" name="<?php echo $i. 'com_vac'?>" onchange="<?php echo "displayVac".$i;?>(this)" id="<?php echo "vacImage".$i;?>" class="form-control" required>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-5">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header bg-success text-light h4">Tourist Address(<?= $count ?>)</div>
                        <div class="card-body">
                            
<div class="row ">
<div class="col-md-3">
<Label><b>REGION (<?= $count ?>)</b></label>
  <select id="<?php echo 'region'.$i;?>" name="<?php echo $i. 'com_region'?>" class="form-control" required>
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
<Label><b>PROVINCE(<?= $count ?>)</b></label>
<select name="<?php echo $i. 'com_province'?>" id="<?php echo 'province'.$i;?>" class="form-control" required>
    <option value=""disabled selected>Select Region First</option>
  </select>                  
</div>
<div class="col-md-3">
<Label><b>Municipality(<?= $count ?>)</b></label>
<select name="<?php echo $i. 'com_municipal'?>" id="<?php echo 'municipal'.$i;?>" class="form-control" required>
    <option value=""disabled selected>Select Province First</option>
  </select>                  
</div>
<div class="col-md-3">
<Label><b>Barangay(<?= $count ?>)</b></label>
<select name="<?php echo $i. 'com_brgy'?>" id="<?php echo 'brgy'.$i;?>" class="form-control" required>
    <option value=""disabled selected>Select Municipal First</option>
  </select>                  
</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/jquery.min.js"></script>
            <script>
    //ADD
       $(document).ready(function(){
            $("#<?php echo 'region'.$i;?>").change(function(){
                var region_id = $(this).val();
                
                $.ajax({
                    url:"includes/ADDRESS/session_province.php",
                    method:"POST",
                    data:{regionID:region_id},
                    success:function(data){
                        $("#<?php echo 'province'.$i;?>").html(data);
                    }
                }); 
            });
            $("#<?php echo 'province'.$i;?>").change(function(){
                var province_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_city.php",
                    method:"POST",
                    data:{provinceID:province_id},
                    success:function(data){
                        $("#<?php echo 'municipal'.$i;?>").html(data);
                    }
                });
            });
            $("#<?php echo 'municipal'.$i;?>").change(function(){
                var city_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_brgy.php",
                    method:"POST",
                    data:{cityID:city_id},
                    success:function(data){
                        $("#<?php echo 'brgy'.$i;?>").html(data);
                    }
                });
            });
        });


       
    
    </script>
 <script>
            
            function <?php echo "getAge".$i;?>(){
                var dob = document.getElementById('<?php echo "dob".$i;?>').value;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('<?php echo "age". $i;?>').value=age;
            }
            
                    </script>


<script>
    //Companions Profile
function <?php echo "triggerClick".$i;?>(){
 document.querySelector('#<?php echo "profileImage".$i;?>').click();
}

function <?php echo "displayImagee".$i;?>(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('<?php echo "#profileDisplay".$i;?>').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}


//companions valid
function <?php echo "idClicked".$i;?>(){
 document.querySelector('#<?php echo "idImage".$i;?>').click();
}

function <?php echo "displayId".$i;?>(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('#<?php echo "idDisplay".$i;?>').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}

                        
//Vaccination Card
function <?php echo "triggered".$i;?>(){
document.querySelector('#<?php echo "vacImage".$i;?>').click();
}

function <?php echo "displayVac".$i;?>(e){
if(e.files[0]){
  var reader = new FileReader();

  reader.onload=function(e) {
    document.querySelector('#<?php echo "vacDisplay".$i;?>').setAttribute('src', e.target.result);
  }
  reader.readAsDataURL(e.files[0]);
}
}
      </script>
</script>




                <?php
					$count++;
					 	}//end for
					 ?>
                     <?php
                }

                     ?>
            </div>
        
           
  

    </div>
</div>
<div class="container">
                                           
<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3 mt-3">
      <button type="submit" name="book" class="btn btn-flat btn-lg btn-primary"><i class="fa fa-book"></i> Book</button>
      </form>
</div>
</div>

<?php include 'footer.php' ?>

<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/img.js"></script>
    <?php include_once 'address.php';?>
    
        <script>
            
function getAge(){
    var dob = document.getElementById('dob').value;
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('age').value=age;
}

        </script>

        <script>
                         
//Vaccination Card
function triggered(){


  document.querySelector('#vacImage').click();
 }

 function displayVac(e){
  if(e.files[0]){
    var reader = new FileReader();

    reader.onload=function(e) {
      document.querySelector('#vacDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
        </script>


</body>
</html>

<?php
}else{
	echo "<script>alert('Please Select tourist Spot and Date'); location.href='step-1.php';</script>";
}//end if else isset
?>