<?php
include_once 'all_approved.php';
?>

<script type="text/javascript">
                        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($ts_name);?>,
    datasets: [{
      label: "Number of Tourist per Tourist Spot",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: <?php echo json_encode($total)?>,
    }],
  },
});

                    </script>