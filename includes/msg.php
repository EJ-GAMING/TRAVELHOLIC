<?php
if (isset($_SESSION['status'])){
?>
    
        
        <div class="alert alert-warning alert-dismissible fade show text-dark" role="alert">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">
                    <div class="col-md mb-2">
                       <strong><?php echo $_SESSION['status']; ?></strong>
                    </div>
                </div>
               
        </div>

<?php
unset($_SESSION['status']);
}

?>