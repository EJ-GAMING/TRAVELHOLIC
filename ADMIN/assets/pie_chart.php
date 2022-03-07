<?php
include_once 'all_approved.php';
?>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: <?php echo json_encode($ts_name);?>,
    datasets: [{
      data: <?php echo json_encode($ts_name);?>,
      backgroundColor: ['#007bff'],
    }],
  },
});

</script>