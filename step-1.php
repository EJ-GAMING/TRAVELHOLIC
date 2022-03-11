<?php
session_start();
    
        include_once 'includes/DB/connection.php';
       
        
        $tsm_id = $_SESSION['tsm'];
        $query = "SELECT *
        FROM tbl_ts_manager
        
        INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
        INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
       
        
        WHERE tbl_ts_manager.tsm_id = '$tsm_id'";
  
        $result = mysqli_query($conn, $query);
       $row = mysqli_fetch_assoc($result);

        if (isset($_SESSION['tsm'])){

        ?> 

<!DOCTYPE html>
<html>
<head>
<title>Travelholic</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.reboot.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script type="text/javascript"> 
function disableselect(e){  
return false  
}  

function reEnable(){  
return true  
}  

//if IE4+  
document.onselectstart=new Function ("return false")  
document.oncontextmenu=new Function ("return false")  
//if NS6  
if (window.sidebar){  
document.onmousedown=disableselect  
document.onclick=reEnable  
}
</script>
</head>
<body>
<?php include_once 'navbar.php'?>


<div class="container ">
       <div class="row d-flex justify-content-center mt-3">
           <div class="col-md-8 h3 text-center">
              <?php include_once 'includes/msg.php';?>
           </div>
       </div>
        <div class="row">
            <div class="col">
                <div class="card mt-3 mb-4">
                <form class="form-horizontal" role="form" method="POST" action="includes/session_date_book.php">
                    <div class="card-header text-center h4 bg-success text-white">Date of Booking & Check Out</div>
                    <div class="card-body ">
                        <div class="row mb-2">
                           
                            <div class="col-md">
                                <a href="ts_info.php?ts_id=<?= $row['tsinfo_id'] ?>" class="btn btn-flat"><i class="fa fa-arrow-left fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-6">
                                <input type="hidden" name="ts_id" value="<?= $row['tsm_id'] ?>">
                                <h1 class="text-dark"><?= $row['ts_name'];?></h1>
                            </div>
                        </div>
                    
                        <div class="row mb-3 mt-5 d-flex justify-content-center">
                            <div class="col-md-6">
                                <label for=""class="h4">Date to Booked</label>
                                <input type="date" name="date_book" class="form-control">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                                <label for=""class="h4">Date to Check Out</label>
                                <input type="date" name="date_out" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md d-flex justify-content-end ">
                               <input type="submit" name="next" id="" class="btn btn-primary" value="Next">
                             
                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php' ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>

    
</body>
</html> 
<?php
        

}else {
    $_SESSION['status'] = "Book First To Access that page."."<strong>"."THANK YOU!"."</strong>";
    header("location: ts_info.php");
}


?>
