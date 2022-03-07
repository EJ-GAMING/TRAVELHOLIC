<?php
include_once '../connection.php';

$output2 = '';
$provinceID = mysqli_real_escape_string($conn, $_POST['provinceID']);

$sql2 = "SELECT * FROM refcitymun 
WHERE provCode = '$provinceID' order by id";
$result2 = mysqli_query($conn, $sql2);

$output2 .= '<option value="" class="text-center" disabled selected>Select Municipal</option>';

while ($row2 = mysqli_fetch_assoc($result2)) {
    $output2 .= '<option value="'.$row2["citymunCode"].'">'.$row2["citymunDesc"].'</option>';

}
echo $output2;


?>