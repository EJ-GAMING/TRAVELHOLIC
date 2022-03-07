  <!-- LOGOUT Modal -->
  <form action="http://localhost/TRAVELHOLIC/ADMIN/INCLUDES/LOGIN_QUERY/logout_query.php" method="POST" >
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
       
      </div>
      <div class="modal-body">
       Are your sure you want to Log Out?
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <input type="submit" class="btn btn-success" name="logout" value="Yes"/>
      </div>
          </form>
    </div>
  </div>
</div>

<!-- DELETE Modal -->
<form action="http://localhost/TRAVELHOLIC/ADMIN/INCLUDES/LOGIN_QUERY/logout_query.php" method="POST" >
<div class="modal fade" id="decline" data-id="<?php echo $row['pktourist_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
       
      </div>
      <div class="modal-body">
        
       Are your sure you want to Delete <strong><?php echo $row['tfname']. ' '. $row['tlname'] ?></strong>'s Booking ?
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a href="includes/REQUEST/decline.php?decline=<?php echo $row['pktourist_id'] ?>" class="btn btn-flat btn-danger">Delete</a>
    </div>
          </form>
    </div>
  </div>
</div>
		