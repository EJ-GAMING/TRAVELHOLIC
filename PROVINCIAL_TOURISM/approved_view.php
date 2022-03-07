<div class="row ">
            <div class="col-md">
               <div class="card mt-3">
                   <div class="card-header h4">Booked Information</div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Tourist Spot You Booked:</label>
                                <input type="text" name="ts_name" readonly value="<?php echo $view['ts_name'] ?>" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label  class="h6">Number of Pax</label>
                                <input type="text" name="com_num" readonly value="<?php echo $view['com_num'] ?>" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label  class="h6">Date Booked</label>
                                <input type="text" name="date_book" readonly value="<?php echo $view['book_date'] ?>" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label  class="h6">Date of Booking</label>
                                <input type="text" name="date_book" readonly value="<?php echo $view['created'] ?>" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label  class="h6">Booking ID</label>
                                <input type="text" name="date_book" readonly value="<?php echo $view['tracker'] ?>" class="form-control">
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
                            <div class="card-header h4">Tourist Information</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <label><strong>Full Name</strong></label>
                                        <input type="text" name="fname" class="form-control" value="<?php echo $view['tfname']. ' '.$view['tlname'] ?>"readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><strong>Birthdate</strong></label>
                                        <input type="date" name="bday" id="dob" class="form-control" value="<?php echo $view['tbday'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Age</strong></label>
                                        <input type="text" name="age" id="age" class="form-control" value="<?php echo $view['tage'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Gender</strong></label>
                                       <input type="text" class="form-control" value="<?php echo $view['tgender'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="">Phone Number</label>
                                        <input type="number" name="phone" class="form-control" value="<?php echo $view['tphone_num'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" class="form-control"  value="<?php echo $view['temail'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">Tourist Image</div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-4 mb-2">
                                        <div class="card">
                                            <div class="card-header text-center">Tourist Image</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="../tourist_image/<?php echo $view['tphoto'] ?>" class="rounded-circle" height="200px" width="150px" >
                                                    </div>                                             
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header text-center">VALID ID</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="../tourist_image/<?php echo $view['valid_id'] ?>" class="rounded-circle" height="200px" width="150px">
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header text-center">VALID ID</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="../tourist_image/<?php echo $view['vacCard'] ?>"  height="200px" width="300px">
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
                        <div class="card-header h4">Tourist Address</div>
                        <div class="card-body">
                            
<div class="row">
<div class="col-md-3">
<Label><b>BARANGAY</b></label>
  <input type="text" class="form-control"  value="<?php echo $view['brgyDesc'] ?>" readonly>
</div>
<div class="col-md-3 text-dark">
<Label><b>MUNICIPAL</b></label>
<input type="text" class="form-control" value="<?php echo $view['citymunDesc'] ?>" readonly>                 
</div>
<div class="col-md-3">
<Label><b>Municipality</b></label>
     <input type="text" class="form-control" value="<?php echo $view['provDesc'] ?>" readonly>                 
</div>
<div class="col-md-3">
<Label><b>REGION</b></label>
<input type="text" class="form-control"  value="<?php echo $view['regDescr'] ?>" readonly>                  
</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
           <!-- ########################## COMPANIONS INFORMATION ######################-->


           <?php 
             
                             $bookers = $view['pktourist_id'];
                             $kasama =  mysqli_query($conn, "SELECT * FROM tbl_tourist_com 
                                INNER JOIN refregion ON tbl_tourist_com.cregion = refregion.regCode
                                INNER JOIN refprovince ON tbl_tourist_com.cprovince = refprovince.provCode
                                INNER JOIN refcitymun ON tbl_tourist_com.cmunicipal = refcitymun.citymunCode
                                INNER JOIN refbrgy ON tbl_tourist_com.cbrgy = refbrgy.brgyCode
                                where pktourist_id = '$bookers'");
                            while ($com_info = mysqli_fetch_assoc($kasama)) {
                              

                             ?>


        <div class="row mt-3">
            <div class="col-md">
                    <div class="card">
                        <div class="card-header h5">Companion's Information</div>
                        <div class="card-body">
                
                        
                        <div class="row">
            <div class="col-md">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header h4">Tourist Information</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <label><strong>Full Name</strong></label>
                                        <input type="text" name="fname" class="form-control" value="<?php echo $com_info['cfname']. ' '.$com_info['clname'] ?>"readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><strong>Birthdate</strong></label>
                                        <input type="date" name="bday" id="dob" class="form-control" value="<?php echo $com_info['cbday'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Age</strong></label>
                                        <input type="text" name="age" id="age" class="form-control" value="<?php echo $com_info['cage'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Gender</strong></label>
                                       <input type="text" class="form-control" value="<?php echo $com_info['cgender'] ?>" readonly>
                                    </div>
                                </div>
                               
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="">Phone Number</label>
                                        <input type="number" name="phone" class="form-control" value="<?php echo $com_info['cphone_num'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" class="form-control"  value="<?php echo $com_info['cemail'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">Tourist Image</div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-4 mb-2">
                                        <div class="card">
                                            <div class="card-header text-center">Tourist Image</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="../tourist_image/<?php echo $com_info['cimg'] ?>" class="rounded-circle" height="200px" width="150px" >
                                                    </div>                                             
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header text-center">VALID ID</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="../tourist_image/<?php echo $com_info['cvalid_id'] ?>" class="rounded-circle" height="200px" width="150px">
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header text-center">Vaccination Card/VaxCert</div>
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md d-flex justify-content-center mb-2">
                                                        <img src="../tourist_image/<?php echo $com_info['cvacCard'] ?>"  height="200px" width="300px">
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
                        <div class="card-header h4">Tourist Address</div>
                        <div class="card-body">
                            
<div class="row">
<div class="col-md-3">
  

<Label><b>BARANGAY</b></label>
  <input type="text" class="form-control"  value="<?php echo $com_info['brgyDesc'] ?>" readonly>
</div>
<div class="col-md-3 text-dark">
<Label><b>MUNICIPAL</b></label>
<input type="text" class="form-control" value="<?php echo $com_info['citymunDesc'] ?>" readonly>                 
</div>
<div class="col-md-3">
<Label><b>Municipality</b></label>
     <input type="text" class="form-control" value="<?php echo $com_info['provDesc'] ?>" readonly>                 
</div>
<div class="col-md-3">
<Label><b>REGION</b></label>
<input type="text" class="form-control"  value="<?php echo $com_info['regDescr'] ?>" readonly>                  
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
      
<?php
  }

?>
