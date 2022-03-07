<?php
$citymun = $user['mtm'];
$sql = "SELECT  ts_name, SUM(com_num) AS total
FROM tbl_ts_info
INNER JOIN tbl_tsm_tomanage ON tbl_ts_info.tsinfo_id = tbl_tsm_tomanage.tsinfo_id  
INNER JOIN tbl_tourist_info ON tbl_tsm_tomanage.tsm_id = tbl_tourist_info.tsm_id
INNER JOIN tbl_ts_location ON tbl_ts_location.tsinfo_id = tbl_ts_info.tsinfo_id
inner join refcitymun on tbl_ts_location.tscitymunCode = refcitymun.citymunCode
WHERE citymunCode = '$citymun' AND (status = 'Arrived' OR status = 'Out')
GROUP BY tbl_ts_info.tsinfo_id ORDER BY total DESC";
          $result = mysqli_query($conn, $sql);
          while ( $row = mysqli_fetch_array($result)) {
              $ts_name[] = $row['ts_name'];
              $total[] = $row['total'];
          }

?>