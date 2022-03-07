<?php
if (isset($_SESSION['status'])){
?>
    
        
        <div class="alert alert-warning alert-dismissible fade show text-dark" role="alert">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <strong><?php echo $_SESSION['status']; ?></strong>
               
        </div>

<?php
unset($_SESSION['status']);
}

?>