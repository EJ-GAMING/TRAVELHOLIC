<?php
 include_once 'connection.php';


        if (isset($_POST['query'])) {
                $search = mysqli_real_escape_string($conn, $_POST['query']);

                $query="SELECT * FROM tbl_ts_info
                                INNER JOIN tbl_ts_img ON tbl_ts_info.tsinfo_id = tbl_ts_img.tsinfo_id
                                INNER JOIN tbl_tsm_tomanage ON tbl_ts_info.tsinfo_id = tbl_tsm_tomanage.tsinfo_id
                        where ts_name like '%$search%' 
                        ORDER BY tbl_ts_info.tsinfo_id DESC";
                $statement = mysqli_query($conn, $query);
        }else {
                $search1 = "SELECT * FROM tbl_ts_info
                INNER JOIN tbl_tsm_tomanage ON tbl_ts_info.tsinfo_id = tbl_tsm_tomanage.tsinfo_id
                ORDER BY tbl_ts_info.tsinfo_id DESC";
                $result = mysqli_query($conn, $search1);
        }if ($rows = mysqli_num_rows($statement) > 0) {
                $output ='<div class="row mb-5">';
                 
                        while ($fetch = mysqli_fetch_array($statement)){
                                $img = $fetch['img1'];
                                $id = $fetch['tsinfo_id'];
                                $ts_name = $fetch['ts_name'];
                                $tsinfo_id = $fetch['tsinfo_id'];
                                $tsm_id = $fetch['tsm_id'];
                                //select the total number of tourist
                                $users = mysqli_query($conn, "SELECT SUM(com_num) AS tourist
                                FROM tbl_tourist_info
                                WHERE tsm_id ='$tsm_id' AND status = 'Arrived'");
                                while($ans = mysqli_fetch_assoc($users)){
                                        $total = $ans['tourist'];
                                        //select the average rating
                                $query = mysqli_query($conn, "SELECT rating_id, TRUNCATE(AVG(rate),1) AS average, COUNT(tsm_id) AS rate
                                FROM tbl_rating 
                                WHERE tsm_id = '$tsm_id'");
                                while($row = mysqli_fetch_assoc($query)){
                                $average = $row['average'];
                                $rating_id = $row['rating_id'];
                                $rate = $row['rate'];
        
                        
                   $output .=
                   '<div class="col-md-4 d-flex justify-content-center mb-1">'.
                   '<div class="card" style="width: 18rem;">'.
                       '<img class="card-img-top" src="photo/'.$img.'" style="height:230px;" alt="Card image cap">'.
                           '<div class="card-body text-center">'.
                               '<h5 class="card-title">'.$ts_name.'(<i class="fa fa-users fa-1x">'.'</i>'. $total.')'.'</h5>'.
                               '<div class="row">'.
                               '<div class="col-md d-flex justify-content-center">'.
                                        
                               '<div class="rateYo-'.$rating_id.'"></div>'.
                               '<script src="js/jquery.min.js"></script>'.
                               '<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js"></script>'.
                                   '<script>'.
                                       '$(function(){'.
                                           '$(".rateYo-'.$rating_id.'"). rateYo({'.
                                               'readOnly:true,'.
                                               'rating:'.$average.','.
                                           '});'.
                                       '});'.
                                   '</script>'.
                                   '</div>'.
                                   '<div class="col-md-12 h4">'.
                                            $average.  '/ 5'.'('.$rate.')'.
                                   '</div>'.
                                '</div>'.
                               '<a href="ts_info.php?ts_id='.$id.'" class="btn btn-lg btn-flat btn-primary text-light">Visit</a>'.
                           '</div>'.
                   '</div>'.
               '</div>';
       
                                }
                                }             
}
            
                $output .= "</tbody>";
                echo $output;
            }else {
                    echo '<div class="text-center h1 mb-5">'.'NO RESULT'.'<br><br><br><br><br><br><br>'.'</div>';
            }
?>