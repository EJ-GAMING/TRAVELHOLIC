<?php

$id = $user['tsm_id'];
$sql = "SELECT SUM(com_num) AS total1, provDesc
FROM tbl_tourist_info
INNER JOIN tbl_tourist_address ON tbl_tourist_info.pktourist_id = tbl_tourist_address.pktourist_id
INNER JOIN refprovince ON tbl_tourist_address.tprovince = refprovince.provCode
WHERE (status = 'Arrived' OR status = 'Out') AND tsm_id = '$id'
GROUP BY provDesc ORDER BY total1 DESC";
          $result = mysqli_query($conn, $sql);
          while ( $row = mysqli_fetch_array($result)) {
              $province[] = $row['provDesc'];
              $total1[] = $row['total1'];
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
    labels: <?php echo json_encode($province);?>,
    datasets: [{
      label: "Most Tourist Came From",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: <?php echo json_encode($total1)?>,
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