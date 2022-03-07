<?php include_once 'includes/session.php'; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TRAVELHOLIC: Online Tourbooking</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <?php include_once 'disable_right_click.php'; ?>

    </head>
    <body class="sb-nav-fixed">
        <?php include_once 'navbar.php';?>
        <?php include 'sidebar.php';?>

            <div id="layoutSidenav_content">
                <main>
               
                    <div class="container-fluid px-4">
                    <h1 class="mt-3">PENDING REQUEST</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pending Request</li>
                        </ol>
                        <div class="row d-flex justify-content-center mt-2">
                          <div class="col-8 text-center h4">
                              <?php include 'includes/msg.php'; ?>
                          </div>
                        </div>
<table id="datatablesSimple">
    <thead class="bg-success text-light">

<th>Full Name</th>
<th>Date Booked</th>
<th>Pax</th>
<th>Booking Number</th>
<th>Status</th>
<th>Tools</th>
</thead>
<tbody>
<?php

$select_query = "SELECT *
FROM tbl_ts_manager
INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
WHERE tbl_ts_manager.tsm_id = '".$_SESSION['tsm101']."' AND status = 'Pending' 
ORDER BY pktourist_id DESC";

$select_result = mysqli_query($conn, $select_query);

while($row = mysqli_fetch_assoc($select_result)){

?>

<tr>

<td><?php echo $row['tfname'].' '.$row['tlname'];?></td>
<td><?php echo $row['book_date']?></td>
<td><?php echo $row['com_num'];?></td>
<td><?php echo $row['tracker'];?></td>
<td><?php echo $row['status'];?></td>
<td class="text-center">
<a href="request_content_view.php?request=<?php echo $row['pktourist_id'];?>" class="btn btn-primary btn-sm btn-flat text-white">
<i class="fas fa-search me-1"></i>View</a>
<a href="#" class="btn btn-primary btn-sm btn-flat text-white"  data-bs-toggle="modal" data-bs-target="#qrcode<?php echo $row['pktourist_id']; ?>" >
<i class="fas fa-check me-1"></i>QR CODE</a>
<a  class="btn btn-danger btn-sm btn-flat text-white" data-bs-toggle="modal" data-bs-target="#del<?php echo $row['pktourist_id']; ?>" >
<i class="fas fa-times me-1"></i>Decline</a>
</td>
</tr>


  <!-- Modal TOURIST_QRCODE -->
  <div class="modal fade" id="qrcode<?php echo $row['pktourist_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-success text-white">
  

      <h5 class="modal-title" id="exampleModalLabel">Travelholic: Online Tourist Booking</h5>
      <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-md d-flex justify-content-center">
        <img src="../QR_CODE/<?php echo $row['qr_location'] ?>.png" height="250px" width="250px">
            
        </div>
      </div>
     
    </div>
    <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>Back</button>
    

    </div>
  </div>
</div>
</div>

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

<?php include_once 'profile_modal.php';?>

                        
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
    </body>
</html>
