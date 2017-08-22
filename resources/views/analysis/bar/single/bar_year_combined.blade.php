 <script type="text/javascript">
   
    var female = <?php echo $female; ?>;
    var male = <?php echo $male; ?>;
    var data_year = <?php echo $year; ?>;
    

var ctx = document.getElementById("Chart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data_year,
        datasets: [{
            label: 'Female',
            data: female,
            backgroundColor:'#6e3d0e',
            hoverBackgroundColor:'#6e3d0e', 
            borderWidth: 1
        },{
            label: 'Male',
            data: male,
            backgroundColor:'#0b0d3e',
            hoverBackgroundColor:'#0b0d3e', 
            borderWidth: 1,
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