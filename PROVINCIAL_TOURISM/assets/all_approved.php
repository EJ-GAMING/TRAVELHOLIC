<?php
$provCode = $user['ptprovCode'];
$sql = "SELECT  ts_name, SUM(com_num) AS total
FROM tbl_ts_info
INNER JOIN tbl_tsm_tomanage ON tbl_ts_info.tsinfo_id = tbl_tsm_tomanage.tsinfo_id  
INNER JOIN tbl_tourist_info ON tbl_tsm_tomanage.tsm_id = tbl_tourist_info.tsm_id
INNER JOIN tbl_ts_location ON tbl_ts_location.tsinfo_id = tbl_ts_info.tsinfo_id
WHERE tsprovcode = '$provCode' AND (STATUS = 'Arrived' OR STATUS = 'Out')
GROUP BY tbl_ts_info.tsinfo_id ORDER BY total DESC";
          $result = mysqli_query($conn, $sql);
          while ( $row = mysqli_fetch_array($result)) {
              $ts_name[] = $row['ts_name'];
              $total[] = $row['total'];
          }

?>