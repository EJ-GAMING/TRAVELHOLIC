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
                
                    <div class="container-fluid px-4">
                    <h1 class="mt-3">List of Tourist</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">List of Tourist</li>
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


$approved_query = "SELECT *
 FROM tbl_ts_manager
 INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
 INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
 INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
 INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
 INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
 INNER JOIN tbl_tourist_img ON tbl_tourist_info.pktourist_id = tbl_tourist_img.pktourist_id
 WHERE status = 'Arrived'
 ORDER BY tbl_tourist_info.pktourist_id DESC";
 $approved_result = mysqli_query($conn, $approved_query);

while($approved = mysqli_fetch_assoc($approved_result)){

?>

<tr>

<td><?php echo $approved['tfname'].' '.$approved['tlname'];?></td>
<td><?php echo $approved['book_date']?></td>
<td><?php echo $approved['com_num'];?></td>
<td><?php echo $approved['ts_name'];?></td>
<td><?php echo $approved['status'];?></td>
<td class="text-center">
<a href="approved_content_view.php?view=<?php echo $approved['pktourist_id']; ?>" class="btn btn-success btn-sm btn-flat text-white">
<i class="fas fa-search me-1"></i>View</a>
<a  class="btn btn-primary btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#undo<?php echo $approved['pktourist_id']; ?>" >
<i class="fas fa-undo me-1"></i>Undo</a>
<a  class="btn btn-danger btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#del<?php echo $approved['pktourist_id']; ?>" >
<i class="fas fa-times me-1"></i>Delete</a>
</td>
</tr>

  <!-- Modal TOURIST_DELETE -->
  <div class="modal fade" id="del<?php echo $approved['pktourist_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

              <input type="hidden" name="id" value="<?php echo $approved['pktourist_id']?>"/>
              Are your sure you want to Delete
              <strong><?php echo $approved['tfname']. ' '.$approved['tlname'];?>'s</strong>
            
                Record?
        </div>
      </div>
     
    </div>
    <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>No</button>
      <button type="submit" class="btn btn-danger" name="del"><i class="fa fa-trash"></i> <strong>Delete</strong></button>
      </form>

    </div>
  </div>
</div>
</div>

<!-- Modal Undo -->
<div class="modal fade" id="undo<?php echo $approved['pktourist_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-success text-white">
    <form action="includes/REQUEST/undo.php" method="POST" enctype="multipart/form-data">

      <h5 class="modal-title" id="exampleModalLabel">Travelholic: Online Tourist Booking</h5>
      <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col text-center">

              <input type="hidden" name="id" value="<?php echo $approved['pktourist_id']?>"/>
              Are your sure you want to Undo
              <strong><?php echo $approved['tfname']. ' '.$approved['tlname'];?>'s</strong>
            
                Record?
        </div>
      </div>
     
    </div>
    <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>No</button>
      <button type="submit" class="btn btn-primary" name="undo"><i class="fa fa-undo"></i> <strong>Yes</strong></button>
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
    



    </body>
</html>
