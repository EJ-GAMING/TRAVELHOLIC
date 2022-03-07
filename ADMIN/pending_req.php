<?php include_once 'includes/session.php'; 
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include_once 'disable_right_click.php'; ?>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">

        <title>TRAVELHOLIC: Online Tourbooking</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once 'navbar.php';?>
        <?php include_once 'sidebar.php';?>

            <div id="layoutSidenav_content">
                <main>
               
                    <div class="container-fluid px-4" id="reload">
                    <h1 class="mt-3">Pending Request</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pending Request</li>
                        </ol>

                        <div class="row d-flex justify-content-center mt-2">
								<div class="col-8 text-center h4">
									<?php include 'includes/msg.php'; ?>
								</div>
							</div>

                        <table id="datatablesSimple" class="table table-bordered table-striped">
    <thead class="bg-success text-white">

<th>Full Name</th>
<th>Date Booked</th>
<th>Pax</th>
<th>Tourist Spot</th>
<th>Status</th>
<th>Tools</th>
</thead>
<tbody class="bg-light">
<?php

$select_query = "SELECT *
FROM tbl_ts_manager
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
INNER JOIN tbl_tourist_address ON tbl_tourist_info.pktourist_id = tbl_tourist_address.pktourist_id
INNER JOIN refregion ON tbl_tourist_address.tregion = refregion.regCode
INNER JOIN refprovince ON tbl_tourist_address.tprovince = refprovince.provCode
INNER JOIN refcitymun ON tbl_tourist_address.tmunicipal = refcitymun.citymunCode
INNER JOIN refbrgy ON tbl_tourist_address.tbrgy = refbrgy.brgyCode
WHERE STATUS = 'Pending' 
ORDER BY tbl_tourist_info.pktourist_id DESC";

$select_result = mysqli_query($conn, $select_query);

while($row = mysqli_fetch_assoc($select_result)){

?>

<tr >
<td style="display:none;"> <input type="text" data-id="<?php echo $row['pktourist_id']?>" value="<?php echo $row['pktourist_id']?>"></td>
<td><?php echo $row['tfname'].' '.$row['tlname'];?></td>
<td><?php echo $row['book_date']?></td>
<td><?php echo $row['com_num'];?></td>
<td><?php echo $row['ts_name'];?></td>
<td><?php echo $row['status'];?></td>
<td class="text-center">
<a href="request_content_view.php?view=<?php echo $row['pktourist_id']?>" class="btn btn-success btn-sm btn-flat text-white">
<i class="fas fa-search me-1"></i>View</a>
<a href="includes/REQUEST/approved.php?tourist=<?php echo $row['pktourist_id']?>" class="btn btn-primary btn-sm btn-flat text-white" >
<i class="fas fa-check me-1"></i>Arrived</a>
<a  class="btn btn-danger btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#del<?php echo $row['pktourist_id']; ?>" >
<i class="fas fa-times me-1"></i>Delete</a>
</td>
</tr>

  <!-- Modal TOURIST_DELETE -->
  <div class="modal fade" id="del<?php echo $row['pktourist_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-success text-white">
    <form action="includes/REQUEST/decline.php" method="POST" enctype="multipart/form-data">

      <h5 class="modal-title" id="exampleModalLabel">Travelholic: Online Tourist Booking</h5>
      <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col text-center">

              <input type="hidden" name="id" value="<?php echo $row['pktourist_id']?>"/>
              Are your sure you want to Delete
              <strong><?php echo $row['tfname']. ' '.$row['tlname'];?>'s</strong>
            
                Record?
        </div>
      </div>
     
    </div>
    <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>No</button>
      <button type="submit" class="btn btn-danger" name="del_req"><i class="fa fa-trash"></i> <strong>Delete</strong></button>
      </form>

    </div>
  </div>
</div>
</div>


<?php
}
?>

</tbody>
</table>
</div>
<?php  include_once 'account_modal.php';?>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            
//add
function triggerClick(){
 document.querySelector('#profileImage').click();
}

function displayImage(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}
        </script>    

<!-- 
<script>
    window.setInterval('refresh()', 10000); 	// Call a function every 10000 milliseconds (OR 10 seconds).

    // Refresh or reload page.
    function refresh() {
        window .location.reload();
    }
</script> -->
    </body>
</html>
