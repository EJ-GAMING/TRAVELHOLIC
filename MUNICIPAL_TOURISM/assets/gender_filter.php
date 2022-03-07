<?php
$munCode = $user['mtm'];
$sql = mysqli_query($conn,"WITH FILTERED_TOURISTS AS
(SELECT DISTINCT tbl_tourist_info.pktourist_id
FROM tbl_tourist_info
JOIN tbl_tsm_tomanage
ON tbl_tourist_info.tsm_id = tbl_tsm_tomanage.tsm_id
JOIN tbl_ts_info
ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
JOIN tbl_ts_location
ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
WHERE ( STATUS = 'Arrived'
OR STATUS = 'Out')
AND tscitymunCode = '023112' )
SELECT t.gender,
t.gcount + IFNULL(c.gcount, 0) AS pergtotal
FROM (SELECT tgender AS gender,
COUNT(*) AS gcount
FROM tbl_tourist_info
JOIN FILTERED_TOURISTS
ON tbl_tourist_info.pktourist_id = FILTERED_TOURISTS.pktourist_id
GROUP BY tgender) t
LEFT JOIN
(SELECT cgender AS gender,
COUNT(*) AS gcount
FROM tbl_tourist_com
JOIN FILTERED_TOURISTS
ON tbl_tourist_com.pktourist_id = FILTERED_TOURISTS.pktourist_id
GROUP BY cgender) c
ON t.gender = c.gender ");
       
          while ( $row = mysqli_fetch_array($sql)) {
              $g[] = $row['gender'];
              $cg[] = $row['pergtotal'];
          }
?>

<script type="text/javascript">
                        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("gender_filter");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($g);?>,
    datasets: [{
      label: "Most Tourist Gender",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: <?php echo json_encode($cg)?>,
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