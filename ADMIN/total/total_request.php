<?php
include_once '../includes/connection.php';
                                        $select_query = "SELECT count(*) as request
                                        FROM tbl_ts_manager
                                        INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
                                        INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
                                        INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
                                        INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
                                        WHERE status = 'Pending' ";
                                        $select_result = mysqli_query($conn, $select_query);
                                        $row = mysqli_fetch_assoc($select_result);

                                        echo $row['request'];

?>