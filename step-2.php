<?php
session_start();
if(isset($_SESSION['b_date'])){
include_once 'includes/getalltourist.php';
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


<div class="container">
<div class="row d-flex justify-content-center mt-3">
           <div class="col-md-8 h3 text-center">
              <?php include_once 'includes/msg.php';?>
           </div>
       </div>
        <div class="row">
            <div class="col">
                <div class="card mt-3 mb-4">
                <form class="form-horizontal" role="form" action="includes/session_ts.php" method="POST">
                    <div class="card-header text-center bg-success text-light h4">Number of Companions</div>
                    <div class="card-body ">
                    <div class="row mb-2">
                            <div class="col-md">
                                <a href="step-1.php?tsm_id=<?php echo $row['tsm_id'] ?>" class="btn btn-flat"><i class="fa fa-arrow-left fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-6">
                                <Label>Tourist Spot You Booked</Label>
                                <input type="hidden" class="form-control" name="tsm_id" value="<?php echo $row['tsm_id']?>" readonly>

                                <input type="text" class="form-control" name="tsinfo_id" value="<?php echo $row['ts_name']?>" readonly>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-6">
                                <label>Date of Booking And Cheack Out</label>
                               <input type="text" name="book_date"  value="<?php echo $_SESSION['b_date'] ?> to <?php echo $_SESSION['b_out'] ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-6">
                                <label>Available Slot On That Date</label>
                               <input type="number" name="available_slot" min="1" class="form-control" value="<?php echo $_SESSION['total']?>" readonly>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-6">
                                <label>Total Number of Companions</label>
                               <input type="number" name="com" class="form-control" placeholder="Total Number of companions" required>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-6">
                               <input type="checkbox" name="box" > 
                               I Agree in the <a href ="#" data-bs-toggle="modal" data-bs-target="#termsandcondition">Terms And Condition</a>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6 d-flex justify-content-center ">
                               <input type="submit" name="next" class="btn btn-primary" value="Next">
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
}else{
    $_SESSION['status'] = "Book First To Access that page."."<strong>"."THANK YOU!"."</strong>";
    header("location: step-1.php");
}//end if else isset
?>