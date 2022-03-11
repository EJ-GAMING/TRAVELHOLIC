<?php
include_once '../DB/connection.php';

$output3 = '';
$cityID = mysqli_real_escape_string($conn, $_POST['cityID']);

$sql3 = "SELECT * FROM refbrgy 
WHERE citymunCode = '$cityID' order by id";
$result3 = mysqli_query($conn, $sql3);

$output3 .= '<option value="" class="text-center" disabled selected>Select Barangay</option>';

while ($row3 = mysqli_fetch_assoc($result3)) {
    $output3 .= '<option value="'.$row3["brgyCode"].'">'.$row3["brgyDesc"].'</option>';

}
echo $output3;


?>