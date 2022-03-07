<!-- Add -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title" id="exampleModalLabel">Add Tourist Spot</h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="includes/TS_QUERY/insert.php" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="col  justify-content-center">
            <!--TO MAKE IT CENTER-->
            <div class="card bg-light mb-3" style="max-width: 78rem;">
              <!--User Info-->
              <div class="card-header h4 ">TOURIST SPOT</div>
              <div class="card-body">

                <div class="row">
                  <div class="col-md-12 text-dark">
                    <Label><b>Tourist Spot Name</b></label>
                    <input type="text" name="ts_name" placeholder="Insert Tourist Spot*" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <Label><b>Tourist Spot Description</b></label>
                    <textarea class="form-control form no-resize summernote" name="ts_des" rows="4" placeholder="Tourist Spot Description" required></textarea>
                  </div>
                </div>





              </div>
            </div>
            <!--User Info End-->
            <!--LOCATION-->
            <div class="card bg-light mb-3" style="max-width: 78rem;">
              <div class="card-header h4 ">LOCATION</div>
              <div class="card-body">

                <div class="row">
                  <div class="col-md-3">
                    <Label><b>REGION</b></label>
                    <select id="region" name="ts_region" class="form-control">
                      <option value="" disabled selected>Select Region</option>
                      <?php
                      $regCode = $user['ptregCode'];
                      $region = "SELECT * FROM refregion 
                        WHERE regCode = '$regCode'
                        ORDER BY id";
                      $region_result = mysqli_query($conn, $region);
                      while ($row1 = mysqli_fetch_assoc($region_result)) {
                        echo " 
                                  <option value='" . $row1['regCode'] . "'>" . $row1['regDescr'] . "</option>
                                  ";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-3 text-dark">
                    <Label><b>PROVINCE</b></label>
                    <select name="ts_province" id="province" class="form-control">
                      <option value="" disabled selected>Select Region First</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <Label><b>Municipality</b></label>
                    <select name="ts_municipal" id="municipal" class="form-control">
                      <option value="" disabled selected>Select Province First</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <Label><b>Barangay</b></label>
                    <select name="ts_brgy" id="brgy" class="form-control">
                      <option value="" disabled selected>Select Municipal First</option>
                    </select>
                  </div>
                </div>
                <br>





              </div>
            </div>

            <!--ADDRESS END-->


          </div>
          <!--CENTER END-->

          <!--left and right-->
          <div class="row">
            <div class="col-sm-6">
              <div class="card bg-light mb-3" style="max-width: 50rem;">
                <div class="card-header  h4">ACTIVITIES & GUIDELINES</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <label><strong>Activities</strong></label>
                      <textarea name="ts_act" class="form-control" cols="30" rows="5" placeholder="Tourist Spot Activities"></textarea>
                    </div>

                    <div class="col-md-12">
                      <label><strong>Guidelines</strong></label>
                      <textarea class="form-control" name="ts_guide" cols="30" rows="5" placeholder="Tourist Spot Guidelines" reqired></textarea>
                    </div>
                    <div class="col-md-6">
                      <label><strong>Max Number of Tourist per Day</strong></label>
                      <input type="text" class="form-control" placeholder="Max # of Tourists" name="ts_max_num" required>
                    </div>
                    <div class="col-md-6">
                      <label><strong>Status (Open Or Closed)</strong></label>
                      <select name="status" class="form-control">
                        <Option value="Open">Open</Option>
                        <option value="Closed">Closed</option>
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
                <div class="card-header text-center h5">These images will be displayed in the HomeScreen of this site for tourist to view</div>


                <div class="card text-white bg-dark mb-3 text-center" style="max-width: 37rem;">

                  <div class="card-body">
                    <br>
                    <br>
                    <br>

                    <div class="row text-center">
                      <div class="col-6">
                        <label><strong>Image 1</strong></label>
                        <input type="file" name="img1">
                      </div>
                      <div class="col-6">
                        <label><strong>Image 2</strong></label>
                        <input type="file" name="img2">
                      </div>
                    </div>
                    <br>
                    <div class="row text-center">
                      <div class="col-6">
                        <label><strong>Image 3</strong></label>
                        <input type="file" name="img3">
                      </div>
                      <div class="col-6">
                        <label><strong>Image 4</strong></label>
                        <input type="file" name="img4">
                      </div>
                    </div>


                    <br>
                    <br>
                    <br>

                  </div>
                </div>
              </div>
              <!--end right-->

            </div>
            <!--left and right end-->

          </div>


        </div>
        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          <button type="submit" class="btn btn-success" name="add"><i class="fa fa-plus"></i> Add</button>

      </form>

    </div>
  </div>
</div>
</div>





<!-- EDIT -->
<div class="modal fade" id="edit<?php echo $row['tsinfo_id'] ?>" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title" id="exampleModalLabel">Add Tourist Spot</h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="includes/TS_QUERY/update.php" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="col  justify-content-center">
            <!--TO MAKE IT CENTER-->
            <div class="card bg-light mb-3" style="max-width: 78rem;">
              <!--User Info-->
              <div class="card-header h4 ">TOURIST SPOT</div>
              <div class="card-body">

                <div class="row">
                  <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id'] ?>">
                  <div class="col-md-12 text-dark">
                    <Label><b>Tourist Spot Name</b></label>
                    <input type="text" class="form-control" placeholder="Tourist Spot Name" name="ts_name" value="<?php echo $row['ts_name']; ?>">
                  </div>
                  <div class="col-md-12">
                    <Label><b>Tourist Spot Description</b></label>
                    <textarea class="form-control" name="ts_des" rows="4" placeholder="Tourist Spot Description"><?php echo $row['ts_des']; ?></textarea>
                  </div>
                </div>





              </div>
            </div>
            <!--User Info End-->
            <!--LOCATION-->
            <div class="card bg-light mb-3" style="max-width: 78rem;">
              <div class="card-header h4 ">LOCATION</div>
              <div class="card-body">



                <div class="row">
                  <div class="col-md-3">
                    <Label><b>REGION</b></label>


                    <select id="<?php echo "region" . $i; ?>" name="ts_region" class="form-control">
                      <option value="<?php echo $row['tsregCode'] ?>"><?php echo $row['regDescr'] ?></option>
                      <?php
                      $regCode = $user['ptregCode'];
                      $region = "SELECT * FROM refregion 
                        WHERE regCode = '$regCode'
                        ORDER BY id";
                      $region_result = mysqli_query($conn, $region);
                      while ($row1 = mysqli_fetch_assoc($region_result)) {
                        echo " 
                                  <option value='" . $row1['regCode'] . "'>" . $row1['regDescr'] . "</option>
                                  ";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-3 text-dark">
                    <Label><b>PROVINCE</b></label>
                    <select name="ts_province" id="<?php echo "province" . $i; ?>" class="form-control">
                      <option value="<?php echo $row['tsprovCode'] ?>"><?php echo $row['provDesc'] ?></option>
                      <?php
                      $province = "SELECT * FROM refprovince WHERE regCode = '" . $row['tsregCode'] . "' ORDER BY id";
                      $province_result = mysqli_query($conn, $province);
                      while ($row1 = mysqli_fetch_assoc($province_result)) {
                        echo " 
                                  <option value='" . $row1['provCode'] . "'>" . $row1['provDesc'] . "</option>
                                  ";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <Label><b>Municipality</b></label>
                    <select name="ts_municipal" id="<?php echo "municipal" . $i; ?>" class="form-control">
                      <option value="<?php echo $row['tscitymunCode'] ?>"><?php echo $row['citymunDesc'] ?></option>
                      <?php
                      $municipal = "SELECT * FROM refcitymun WHERE provCode = '" . $row['tsprovCode'] . "' ORDER BY id";
                      $municipal_result = mysqli_query($conn, $municipal);
                      while ($row1 = mysqli_fetch_assoc($municipal_result)) {
                        echo " 
                                  <option value='" . $row1['citymunCode'] . "'>" . $row1['citymunDesc'] . "</option>
                                  ";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <Label><b>Barangay</b></label>
                    <select name="ts_brgy" id="<?php echo "brgy" . $i; ?>" class="form-control">
                      <option value="<?php echo $row['tsbrgyCode'] ?>"><?php echo $row['brgyDesc'] ?></option>
                      <?php
                      $brgy = "SELECT * FROM refbrgy WHERE citymunCode = '" . $row['tscitymunCode'] . "' ORDER BY id";
                      $brgy_result = mysqli_query($conn, $brgy);
                      while ($row1 = mysqli_fetch_assoc($brgy_result)) {
                        echo " 
                                  <option value='" . $row1['brgyCode'] . "'>" . $row1['brgyDesc'] . "</option>
                                  ";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <br>





              </div>
            </div>

            <!--ADDRESS END-->


          </div>
          <!--CENTER END-->

          <!--left and right-->
          <div class="row">
            <div class="col-sm-6">
              <div class="card bg-light mb-3" style="max-width: 50rem;">
                <div class="card-header  h4">ACTIVITIES & GUIDELINES</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <br>
                      <label><strong>Activities</strong></label>
                      <input type="text" class="form-control" placeholder="Activities" name="ts_act" value="<?php echo $row['act'] ?>">
                    </div>

                    <div class="col-md-12">
                      <label><strong>Guidelines</strong></label>
                      <textarea class="form-control" name="ts_guide" placeholder="Tourist Spot Description"><?php echo $row['guide']; ?></textarea>
                    </div>
                    <div class="col-md-6">
                      <label><strong>Max Number of Tourist per Day</strong></label>
                      <input type="text" class="form-control" placeholder="Max # of Tourists" name="ts_max_num" value="<?php echo $row['max_num'] ?>">
                    </div>
                    <div class="col-md-6">
                      <label><strong>Status (Open Or Closed)</strong></label>
                     <select name="status" class="form-control">
                       <?php
                      if ($row['ts_status'] === 'Open') {
                        echo '<option value="Open">Open</option>';
                        echo '<option value="Closed">Closed</option>';
                      } else {
                        echo '<option value="Closed">Closed</option>';
                        echo '<option value="Open">Open</option>';
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
                <div class="card-header  h4">IMAGES</div>


                <div class="card text-white bg-dark mb-3 text-center" style="max-width: 37rem;">

                  <div class="card-body">


                    <div class="row text-center">
                      <div class="col-6">
                        <img src="../photo/<?php echo $row['img1']; ?>" height="100px">

                      </div>
                      <div class="col-6">
                        <img src="../photo/<?php echo $row['img2']; ?>" height="100px">
                      </div>
                    </div>
                    <br>
                    <div class="row text-center">
                      <div class="col-6">
                        <img src="../photo/<?php echo $row['img3']; ?>" height="100px">

                      </div>
                      <div class="col-6">
                        <img src="../photo/<?php echo $row['img4']; ?>" height="100px">

                      </div>
                    </div>



                  </div>
                </div>
              </div>
              <!--end right-->

            </div>
            <!--left and right end-->

          </div>

        </div>
        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
          <button type="submit" class="btn btn-warning text-white" name="update"><i class="fa fa-edit"></i>Update</button>

      </form>

    </div>
  </div>
</div>
</div>




<!-- search -->
<div class="modal fade" id="view<?php echo $row['tsinfo_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic: Online Tourbooking System</h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="col  justify-content-center">
          <!--TO MAKE IT CENTER-->
          <div class="card bg-light mb-3" style="max-width: 78rem;">
            <!--User Info-->
            <div class="card-header h4 ">TOURIST SPOT</div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-12 text-dark">
                  <Label><b>Tourist Spot Name</b></label>
                  <input type="text" class="form-control" placeholder="Tourist Spot Name" name="ts_name" value="<?php echo $row['ts_name']; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <Label><b>Tourist Spot Description</b></label>
                  <textarea class="form-control" name="ts_des" rows="4" placeholder="Tourist Spot Description" readonly><?php echo $row['ts_des']; ?></textarea>
                </div>
              </div>





            </div>
          </div>
          <!--User Info End-->
          <!--LOCATION-->
          <div class="card bg-light mb-3" style="max-width: 78rem;">
            <div class="card-header h4 ">LOCATION</div>
            <div class="card-body">


              <div class="row">
                <div class="col-md-3">
                  <Label><b>REGION</b></label>
                  <input type="text" class="form-control" placeholder="REGION" name="ts_street" value="<?php echo $row['regDescr']; ?>" readonly>
                </div>
                <div class="col-md-3">
                  <Label><b>Province</b></label>
                  <input type="text" class="form-control" placeholder="Province" name="ts_province" value="<?php echo $row['provDesc']; ?>" readonly>
                </div>
                <div class="col-md-3">
                  <Label><b>Municipality</b></label>
                  <input type="text" class="form-control" placeholder="Municipality" name="ts_municipal" value="<?php echo $row['citymunDesc']; ?>" readonly>
                </div>
                <div class="col-md text-dark">
                  <Label><b>Barangay</b></label>
                  <input type="text" class="form-control" placeholder="Barangay" name="ts_brgy" value="<?php echo $row['brgyDesc']; ?>" readonly>
                </div>
              </div>
              <br>





            </div>
          </div>

          <!--ADDRESS END-->


        </div>
        <!--CENTER END-->

        <!--left and right-->
        <div class="row">
          <div class="col-sm-6">
            <div class="card bg-light mb-3" style="max-width: 50rem;">
              <div class="card-header  h4">ACTIVITIES & GUIDELINES</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <br>
                    <label><strong>Activities</strong></label>
                    <input type="text" class="form-control" placeholder="Activities" name="ts_act" value="<?php echo $row['act'] ?>" readonly>
                  </div>

                  <div class="col-md-12">
                    <label><strong>Guidelines</strong></label>
                    <textarea class="form-control" name="ts_guide" placeholder="Tourist Spot Description" readonly><?php echo $row['guide']; ?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label><strong>Max Number of Tourist per Day</strong></label>
                    <input type="text" class="form-control" placeholder="Max # of Tourists" name="ts_max_num" value="<?php echo $row['max_num'] ?>" readonly>
                  </div>
                  <div class="col-md-6">
                    <label><strong>Status (Open Or Closed)</strong></label>
                    <select name="status" class="form-control" readonly>
                      <?php
                      if ($row['ts_status'] === 'Open') {
                        echo '<option value="Open">Open</option>';
                        echo '<option value="Closed">Closed</option>';
                      } else {
                        echo '<option value="Closed">Closed</option>';
                        echo '<option value="Open">Open</option>';
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
              <div class="card-header  h4">IMAGES</div>


              <div class="card text-white bg-dark mb-3 text-center" style="max-width: 37rem;">

                <div class="card-body">


                  <div class="row text-center">
                    <div class="col-6">
                      <img src="../photo/<?php echo $row['img1']; ?>" height="100px">
                    </div>
                    <div class="col-6">
                      <img src="../photo/<?php echo $row['img2']; ?>" height="100px">
                    </div>
                  </div>
                  <br>
                  <div class="row text-center">
                    <div class="col-6">
                      <img src="../photo/<?php echo $row['img3']; ?>" height="100px">
                    </div>
                    <div class="col-6">
                      <img src="../photo/<?php echo $row['img4']; ?>" height="100px">

                    </div>
                  </div>



                </div>
              </div>
            </div>
            <!--end right-->

          </div>
          <!--left and right end-->

        </div>


      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-arrow-left"></i> Back</button>


      </div>
    </div>
  </div>
</div>



<!-- Modal DELETE -->
<div class="modal fade" id="delete<?php echo $row['tsinfo_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

            <input type="hidden" name="id" value="<?php echo $row['tsinfo_id'] ?>" />
            Are your sure you want to Delete
            <strong><?php echo $row['ts_name']; ?>'s</strong>

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

<!-- TS IMAGES UPDATE-->
<!-- TS IMG1 UPDATE-->


<div class="modal fade" id="tsphoto1<?php echo $row['tsinfo_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center bg-success text-white">
        <h5 class="modal-title ">
          Image 1 Update
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/TS_QUERY/ts_img_update.php" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col">
              <h4 class="text-center"> Update Profile</h4>
            </div>
          </div>
          <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id'] ?>">
          <div class="row">
            <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['img1'] ?>" height="165px" width="200px" />
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
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img1"><i class="fa fa-edit fa-sm"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- TS IMG2 UPDATE-->


<div class="modal fade" id="tsphoto2<?php echo $row['tsinfo_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center bg-success text-white">
        <h5 class="modal-title ">
          Image 2 Update
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/TS_QUERY/ts_img_update.php" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col">
              <h4 class="text-center"> Update Image 2</h4>
            </div>
          </div>
          <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id'] ?>">
          <div class="row">
            <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['img2'] ?>" height="165px" width="200px" />
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
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img2"><i class="fa fa-edit fa-sm"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- TS IMG3 UPDATE-->


<div class="modal fade" id="tsphoto3<?php echo $row['tsinfo_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center bg-success text-white">
        <h5 class="modal-title ">
          Image 3 Update
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/TS_QUERY/ts_img_update.php" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col">
              <h4 class="text-center"> Update Image 3</h4>
            </div>
          </div>
          <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id'] ?>">
          <div class="row">
            <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['img3'] ?>" height="165px" width="200px" />
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
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img3"><i class="fa fa-edit fa-sm"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- TS IMG4 UPDATE-->


<div class="modal fade" id="tsphoto4<?php echo $row['tsinfo_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center bg-success text-white">
        <h5 class="modal-title ">
          Image 4 Update
        </h5>
        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/TS_QUERY/ts_img_update.php" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col">
              <h4 class="text-center"> Update Image 4</h4>
            </div>
          </div>
          <input type="hidden" name="tsinfo_id" value="<?php echo $row['tsinfo_id'] ?>">
          <div class="row">
            <div class="col d-flex justify-content-center">
              <img src="../photo/<?php echo $row['img4'] ?>" height="165px" width="200px" />
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
        <button type="submit" class="btn btn-warning btn-sm btn-flat" name="img4"><i class="fa fa-edit fa-sm"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>