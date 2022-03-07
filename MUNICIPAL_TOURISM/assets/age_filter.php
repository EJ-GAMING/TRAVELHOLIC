<?php
$e = $user['mtm'];
$sql = "SELECT SUM(com_num) AS cage,
CASE
 WHEN tage < 1 THEN '0-1 Years Old'
 WHEN tage BETWEEN 1 AND 3 THEN '1-3 Years Old'
 WHEN tage BETWEEN 3 AND 10 THEN '3-10 Years Old'
 WHEN tage BETWEEN 10 AND 18 THEN '10-18 Years Old'
 WHEN tage BETWEEN 18 AND 60 THEN '18-60 Years Old'
 WHEN tage > 60 THEN '60-Above'
END AS age_range
       
FROM tbl_tourist_info
INNER JOIN tbl_tourist_address ON tbl_tourist_info.pktourist_id = tbl_tourist_address.pktourist_id
INNER JOIN refprovince ON tbl_tourist_address.tprovince = refprovince.provCode
INNER JOIN tbl_tsm_tomanage ON tbl_tourist_info.tsm_id = tbl_tsm_tomanage.tsm_id
INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id

WHERE (STATUS = 'Arrived' OR STATUS = 'Out') AND tscitymunCode = '$e'
GROUP BY age_range ORDER BY age_range ASC";
          $result_ps = mysqli_query($conn, $sql);
          while ( $row = mysqli_fetch_array($result_ps)) {
              $age_range[] = $row['age_range'];
              $cage[] = $row['cage'];
          }

?>

<script>
                        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("age_filter");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels:     <?php echo json_encode($age_range);?> ,
    datasets: [{
      label: "Graph Tourist Age Intervals",
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
      data: <?php echo json_encode($cage)?>,
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

