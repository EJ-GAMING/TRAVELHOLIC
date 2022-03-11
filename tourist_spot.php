<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Travelholic</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.reboot.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.css"/>
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
<body class="bg-light">
<?php include_once 'navbar.php'; ?>

<div class="row">
    <div class="col-md">
        <h2 class="h1 bg-dark text-light text-center p-5">All Tourist Spot</h2>
    </div>
</div>
<div class="row d-flex justify-content-center mt-3">
           <div class="col-md-8 h3 text-center">
              <?php include_once 'includes/msg.php';?>
           </div>
       </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md">

            <a href="index.php" class="btn btn-light" data-toggle="popover" data-bs-trigger="hover" data-bs-content="Back"><i class="fa fa-arrow-left fa-2x text-success" ></i></a>
        </div>
        <div class="col-md-4 ">
        <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-success" placeholder="Search Tourist Spot">
        </div>
    </div>
<div class="row mt-5" id="tourist-data">
        <div class="col-md-12">
        
    <?php
    include_once 'includes/connection.php';
           $select = "SELECT *
           FROM tbl_ts_manager
           INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
           INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
           INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
           INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
           INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
           INNER JOIN tbl_ts_act_guide ON tbl_ts_info.tsinfo_id = tbl_ts_act_guide.tsinfo_id
           INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
           ORDER BY tbl_ts_info.tsinfo_id DESC";
           
           $select_result = mysqli_query($conn, $select);
           
            ?>
        <div class="row mb-5">
            <?php
               
                while ($fetch = mysqli_fetch_assoc($select_result)){

               ?>
                <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="photo/<?php echo $fetch['img1']?>" style="height:230px;" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $fetch['ts_name']?>
                            <?php
                            $tsm_id = $fetch['tsm_id'];
                            $users = mysqli_query($conn, "SELECT SUM(com_num) AS tourist
                            FROM tbl_tourist_info
                            WHERE tsm_id ='$tsm_id' AND (status = 'Arrived' OR status = 'Out')");
                            while($ans = mysqli_fetch_assoc($users)){?>

                            (<i class="fa fa-users fa-1x"></i> <?php echo $ans['tourist']?>)</h5>
                           <div class="row">
                               <div class="col-md d-flex justify-content-center">

                            <?php
                            }
                            ?>
                          
                              



                               <?php 
                include 'includes/connection.php';

                $tsm_id = $fetch['tsm_id'];

                $query = mysqli_query($conn, "SELECT rating_id, TRUNCATE(AVG(rate),1) AS average, COUNT(tsm_id) AS rate
                FROM tbl_rating 
                WHERE tsm_id = '$tsm_id'");
                while($row = mysqli_fetch_assoc($query)){
                    $average = $row['average'];
                    
                    ?>

                <div class="rateYo-<?php echo $row['rating_id'];?>"></div>
                
                <script src="js/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js"></script>
                    <script>
                        $(function(){
                            $(".rateYo-<?php echo $row['rating_id'];?>"). rateYo({
                                readOnly:true,
                                rating:<?php echo $average;?>,
                            });   
                        });
                    </script>

               



                               </div>
                               <div class="col-md-12 h4">
                                        <?php echo $average ?> / 5(<?php echo $row['rate'];?>)
                               </div>

                               <?php
                }?>
                           </div>
                           <?php
                           $status = $fetch['ts_status'];
                                if ($status === 'Open') {
                                    ?>
                                    <a href="ts_info.php?ts_id=<?php echo $fetch['tsinfo_id']?>" class="btn btn-lg btn-flat btn-primary text-light" name="">Visit</a>                           
                                
                                <?php
                                }else {?>
                                   <button disabled="disabled" class="btn btn-primary">Temporary Closed</button>
                                   <?php
                                }
                           ?>
                        </div>
                </div>
            </div>
                    
         
                   <?php
                }
                ?>
                
            
            
        </div>
        </div><!--end left-->
       
    </div>
   
    <?php include_once 'footer.php'; ?>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function(){
            $("#search").keyup(function(){
                var search =$(this).val();
                $.ajax({
                    url:'includes/search.php',
                    method:'POST',
                    data:{query:search},
                    success:function(response){
                        $("#tourist-data").html(response);
                    }

                });
            });
        });
    </script>
    <script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
</body>
</html>