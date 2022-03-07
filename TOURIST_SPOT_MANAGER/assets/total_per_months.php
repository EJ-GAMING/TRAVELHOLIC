<?php

$id = $user['tsm_id'];
$sql = "SELECT MONTHNAME(book_date) AS Months, sum(com_num) as total
FROM tbl_ts_manager
INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
WHERE tbl_ts_manager.tsm_id = '$id' AND (status = 'Arrived' OR status = 'Out')
GROUP BY Months ORDER BY STR_TO_DATE(CONCAT('0001 ',Months, ' 01'), '%Y %M %d')";
          $result = mysqli_query($conn, $sql);
          while ( $row = mysqli_fetch_array($result)) {
              $months[] = $row['Months'];
              $total[] = $row['total'];
          }

?>