<?php
include_once '../includes/session.php';
$output = '';

if (isset($_POST['query'])) {
    $search = mysqli_real_escape_string($conn, $_POST['query']);

    $query="SELECT *
    FROM tbl_ts_manager
    INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
    INNER JOIN tbl_tsm_address ON tbl_ts_manager.tsm_id = tbl_tsm_address.tsm_id
    INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
    INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
    INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
    INNER JOIN tbl_tourist_img ON tbl_tourist_info.pktourist_id = tbl_tourist_img.pktourist_id
    INNER JOIN tbl_tourist_address ON tbl_tourist_info.pktourist_id = tbl_tourist_address.pktourist_id
INNER JOIN refregion ON tbl_tourist_address.tregion = refregion.regCode
INNER JOIN refprovince ON tbl_tourist_address.tprovince = refprovince.provCode
INNER JOIN refcitymun ON tbl_tourist_address.tmunicipal = refcitymun.citymunCode
INNER JOIN refbrgy ON tbl_tourist_address.tbrgy = refbrgy.brgyCode
WHERE STATUS = 'Approved' AND YEAR(book_date) = '$search'
    ORDER BY tbl_tourist_info.pktourist_id DESC";
    $statement = mysqli_query($conn, $query);
}else {
    $kastoy = "SELECT * FROM bookers ORDER BY bookers_id DESC";
    $sagot = mysqli_query($conn, $kastoy);

    
}
if ($rows = mysqli_num_rows($statement) >= 1) {
    $output ="<thead class='bg-success text-light'>
    <th>Full Name</th>
    <th>Booked Date</th>
    <th>Pax</th>
    <th>Tourist Spot</th>
    <th>Tools</th>
   
    </thead>
    <tbody>";
    while ($row = mysqli_fetch_assoc($statement)) {
        $id = $row['pktourist_id'];
       $output .=
       "<tr>".
            "<td>". $row['tfname']." ".$row['tlname']."</td>".
            "<td>". $row['book_date']."</td>".
            "<td>". $row['com_num']."</td>".
            "<td>". $row['ts_name']."</td>".
            "<td>".
            "<a href='peryear_info.php?view=".$id."' class='btn btn-primary btn-sm btn-flat text-white'>"
            ."View"."</a>"
            ."</td>".
       "</tr>";
    }

    $output .= "</tbody>";
    echo $output;
}else {
    echo"<thead class='bg-success text-light'>
    <th>Full Name</th>
    <th>Booked Date</th>
    <th>Pax</th>
    <th>Tourist Spot</th>
    <th>Tools</th>
   
    </thead>
    <tbody>".
    "<td colspan='5' class='text-center'>NO RESULT</td>"
    ."</tbody>
    ";
}


?>