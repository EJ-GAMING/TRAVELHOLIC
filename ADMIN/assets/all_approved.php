<?php
$sql = "SELECT ts_name, sum(com_num) AS total
          FROM tbl_ts_manager
          INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
          INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
          INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
          INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
          WHERE status = 'Arrived'
          GROUP BY ts_name ORDER BY total DESC";
          $result = mysqli_query($conn, $sql);
          while ( $row = mysqli_fetch_array($result)) {
              $ts_name[] = $row['ts_name'];
              $total[] = $row['total'];
          }

?>