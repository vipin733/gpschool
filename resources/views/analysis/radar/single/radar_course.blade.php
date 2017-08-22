<script type="text/javascript">
   
   
   var data_course_wise = <?php echo $course_wise; ?>;
 
    var data_course_name = <?php echo $course_name; ?>;
    

var ctx = document.getElementById("Chart14");
var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
        labels: data_course_name,
    datasets: [
        {
            label: "Studens",
            backgroundColor: "rgba(179,181,198,0.2)",
            borderColor: "rgba(179,181,198,1)",
            pointBackgroundColor: "rgba(179,181,198,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(179,181,198,1)",
            data: data_course_wise
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