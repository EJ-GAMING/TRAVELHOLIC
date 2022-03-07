<?php
include_once '../includes/session.php';
                                        $municipalCode = $user['mtm'];
                                        $select_query = "SELECT COUNT(*) AS request
                                        FROM tbl_tourist_info
                                        INNER JOIN tbl_ts_manager ON tbl_tourist_info.tsm_id = tbl_ts_manager.tsm_id
                                        INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
                                        INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
                                        INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
                                        WHERE STATUS = 'Pending' AND tscitymunCode = '$municipalCode'";
                                        $select_result = mysqli_query($conn, $select_query);
                                        $row = mysqli_fetch_assoc($select_result);

                                        echo $row['request'];

?>