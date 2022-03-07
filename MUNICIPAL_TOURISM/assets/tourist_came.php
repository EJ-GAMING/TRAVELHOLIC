<?php
$z = $user['mtm'];
  $sql = mysqli_query($conn,"SELECT SUM(com_num) AS a, provDesc as b
  FROM tbl_tourist_info
  INNER JOIN tbl_tourist_address ON tbl_tourist_info.pktourist_id = tbl_tourist_address.pktourist_id
  INNER JOIN refprovince ON tbl_tourist_address.tprovince = refprovince.provCode
  INNER JOIN tbl_tsm_tomanage ON tbl_tourist_info.tsm_id = tbl_tsm_tomanage.tsm_id
  INNER JOIN tbl_ts_info ON tbl_tsm_tomanage.tsinfo_id = tbl_ts_info.tsinfo_id
  INNER JOIN tbl_ts_location ON tbl_ts_info.tsinfo_id = tbl_ts_location.tsinfo_id
  inner join refcitymun on tbl_ts_location.tscitymunCode = refcitymun.citymunCode
  WHERE(status = 'Arrived' OR status = 'Out') AND citymunCode = '$z'
GROUP BY provDesc ORDER BY a DESC");
       
          while ( $row = mysqli_fetch_array($sql)) {
              $b[] = $row['b'];
              $a[] = $row['a'];
          }
?>

<script type="text/javascript">
                        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("tourist_came");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($b);?>,
    datasets: [{
      label: "Most Tourist Came From",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: <?php echo json_encode($a)?>,
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