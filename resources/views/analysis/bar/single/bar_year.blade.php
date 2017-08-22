<script type="text/javascript" >
   
    var data_student = <?php echo $student; ?>;
    var data_year = <?php echo $year; ?>;
    

var ctx = document.getElementById("Chart8");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data_year,
        datasets: [{
            label: 'Studens',
            data: data_student,
            backgroundColor:'#0b0d3e',
            hoverBackgroundColor:'#0b0d3e', 
            borderWidth: 1
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