<script type="text/javascript">
   
   
    var data_female_course = <?php echo $female_course; ?>;
    var data_male_course = <?php echo $male_course; ?>;
    var data_course_name = <?php echo $course_name; ?>;
    

var ctx = document.getElementById("Chart15");
var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
        labels: data_course_name,
    datasets: [
        {
            label: "Female",
            backgroundColor: "rgba(179,181,198,0.2)",
            borderColor: "rgba(179,181,198,1)",
            pointBackgroundColor: "rgba(179,181,198,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(179,181,198,1)",
            data: data_female_course
        },
        {
            label: "Male",
            backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            pointBackgroundColor: "rgba(255,99,132,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(255,99,132,1)",
            data: data_male_course
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