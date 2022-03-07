<?php
$e = $user['ptprovCode'];
$sql = "SELECT MONTHNAME(book_date) AS c, SUM(com_num) AS d
FROM tbl_ts_manager
INNER JOIN tbl_tsm_info ON tbl_ts_manager.tsm_id = tbl_tsm_info.tsm_id
INNER JOIN tbl_tsm_tomanage ON tbl_ts_manager.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
INNER JOIN tbl_tourist_info ON tbl_ts_manager.tsm_id = tbl_tourist_info.tsm_id
WHERE (status = 'Arrived' OR status = 'Out') AND tsprovCode = '$e'
GROUP BY c ORDER BY STR_TO_DATE(CONCAT('0001 ',c, ' 01'), '%Y %M %d')";
          $result_ps = mysqli_query($conn, $sql);
          while ( $row = mysqli_fetch_array($result_ps)) {
              $c[] = $row['c'];
              $d[] = $row['d'];
          }

?>

<script>
                        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("peak_off");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels:     <?php echo json_encode($c);?> ,
    datasets: [{
      label: "Graph For Peak And Off Season",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: <?php echo json_encode($d)?>,
    }],
  },
  options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});

                    </script>

