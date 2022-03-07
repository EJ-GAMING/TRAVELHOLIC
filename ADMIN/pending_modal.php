
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

