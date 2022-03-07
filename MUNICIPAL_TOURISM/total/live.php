<?php
include_once '../includes/session.php';

$select_query = "SELECT *
FROM tbl_ts_manager
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
INNER JOIN tbl_tourist_address ON tbl_tourist_info.pktourist_id = tbl_tourist_address.pktourist_id
INNER JOIN refregion ON tbl_tourist_address.tregion = refregion.regCode
INNER JOIN refprovince ON tbl_tourist_address.tprovince = refprovince.provCode
INNER JOIN refcitymun ON tbl_tourist_address.tmunicipal = refcitymun.citymunCode
INNER JOIN refbrgy ON tbl_tourist_address.tbrgy = refbrgy.brgyCode
WHERE STATUS = 'Pending' 
ORDER BY tbl_tourist_info.pktourist_id DESC";

$select_result = mysqli_query($conn, $select_query);

while($row = mysqli_fetch_assoc($select_result)){
    $id = $row['pktourist_id'];
    $fname = $row['tfname'];
    $lname = $row['tlname'];
    $date = $row['book_date'];
    $com_num = $row['com_num'];
    $ts_name = $row['ts_name'];
    $status = $row['status'];

    $output = '<table id="datatablesSimple" class="table table-bordered table-striped">
    <thead class="bg-success text-white">

    <th>Full Name</th>
    <th>Date Booked</th>
    <th>Pax</th>
    <th>Tourist Spot</th>
    <th>Status</th>
    <th>Tools</th>
    </thead>
    <tbody class="bg-light">
<tr>
<td style="display:none;"><input type="text" data-id="'.$id.'" value="'.$id.'</td>'.
'<td>'.$fname.' '.$lname.'</td>'.
'<td>'.$date.'</td>'.
'<td>'.$com_num.'</td>'.
'<td>'.$ts_name.'</td>'.
'<td>'.$status.'</td>'.
'<td class="text-center">
<a href="request_content_view.php?view='.$id.'" class="btn btn-success btn-sm btn-flat text-white">
<i class="fas fa-search me-1"></i>View</a>
<a href="request_content_view.php?view='.$id.'" class="btn btn-success btn-sm btn-flat text-white">
<i class="fas fa-check me-1"></i>Approved</a>
<a href="request_content_view.php?view='.$id.'" class="btn btn-success btn-sm btn-flat text-white">
<i class="fas fa-times me-1"></i>Decline</a>
</td>
</tr>
</tbody>
</table>';


include_once '../pending_modal.php';


}

echo $output;
?>