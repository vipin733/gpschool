<script type="text/javascript">
   
   
    var data_female = <?php echo $female; ?>;
    var data_male = <?php echo $male; ?>;
    var data_year = <?php echo $year; ?>;
    

var ctx = document.getElementById("Chart2");
var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
        labels: data_year,
    datasets: [
        {
            label: "Female",
            backgroundColor: "rgba(179,181,198,0.2)",
            borderColor: "rgba(179,181,198,1)",
            pointBackgroundColor: "rgba(179,181,198,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(179,181,198,1)",
            data: data_female
        },
        {
            label: "Male",
            backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            pointBackgroundColor: "rgba(255,99,132,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(255,99,132,1)",
            data: data_male
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero:true
                },
                 gridLines: {
                    display:false
                }
            }]
        }
    }
});
</script>