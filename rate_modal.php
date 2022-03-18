<script src="js/adapter.min.js"></script>
    <script src="js/vue.min.js"></script>
    <script src="js/instascan.min.js"></script>
<div class="modal fade" id="rate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
       
      </div>
      <div class="modal-body">
          <form action="includes/rate.php" method="post">
          <div class="row">
            
              <div class="col-md-12">
              <input type="hidden" name="tsinfo_id" class="form-control" value="<?= $tsinfo_id?>">
                  <input type="hidden" name="tsm_id" class="form-control" value="<?= $location_info['tsm_id']?>">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <label class="h3 d-flex justify-content-center">Please Scan Your QR Code to Generate your Booking ID</label>
                        <center><video id="preview" width="60%" class="bg-dark"></video></center>
                    </div>
                    <div class="col-md-6">
                    <input type="text" name="book_id" id="qrcode" class="form-control" placeholder="Booking ID"  required>
                    </div>
                </div>

              </div>
          </div>
          <div class="row">
              <div class="col-md-12 d-flex justify-content-center">
                <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
                </div>
              </div>
              <div class="col-md text-center">
              <i> Note: Only Those Tourist who Already arrived can rate tourist spot</i>
            </div>
          </div>
       
      </div>
      <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> <strong>Cancel</strong></button>
        <button type="submit" class="btn btn-success" name="rating"><i class="fa fa-star"></i><strong>Rate</strong></button>
      </div>
      </form>
    </div>
  </div>
</div>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById("preview")
        });

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.legth = 1) {
                scanner.start(cameras[0]);
            } else {
                alert('No Cameras Found');
            }
        }).catch(function(e) {
            console.error(e);
        });


        scanner.addListener('scan', function(c) {
            document.getElementById('qrcode').value = c;
      

        });
    </script>