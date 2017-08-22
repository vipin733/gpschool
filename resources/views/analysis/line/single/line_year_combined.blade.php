<script type="text/javascript">
   
   
    var female = <?php echo $female; ?>;
    var male = <?php echo $male; ?>;
    var data_year = <?php echo $year; ?>;
    

var ctx = document.getElementById("Chart18");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: data_year,
        datasets: [{
            label: 'Female',
            data: female,
             fill: false,
            lineTension: 0.1,
            backgroundColor: "#6e3d0e",
            borderColor: "#6e3d0e",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "#6e3d0e",
            pointBackgroundColor: "#6e3d0e",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#6e3d0e",
            pointHoverBorderColor: "#6e3d0e",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            spanGaps: false
        },{
            label: 'Male',
            data: male,
             fill: false,
            lineTension: 0.1,
            backgroundColor: "#0b0d3e",
            borderColor: "#0b0d3e",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "#0b0d3e",
            pointBackgroundColor: "#0b0d3e",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#0b0d3e",
            pointHoverBorderColor: "#0b0d3e",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            spanGaps: false
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
