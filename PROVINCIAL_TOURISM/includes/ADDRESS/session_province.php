<?php
include_once '../connection.php';

$output1 = '';
$regionID = mysqli_real_escape_string($conn, $_POST['regionID']);

$sql1 = "SELECT * FROM refprovince 
WHERE regCode = '$regionID' order by id";
$result1 = mysqli_query($conn, $sql1);

$output1 .= '<option value="" class="text-center font-weight-bold" disabled selected>Select Province</option>';

while ($row1 = mysqli_fetch_assoc($result1)) {
    $output1 .= '<option value="'.$row1["provCode"].'">'.$row1["provDesc"].'</option>';

}
echo $output1;


?>