<script type="text/javascript" >
   
    var data_course_wise = <?php echo $course_wise; ?>;
 
    var data_course_name = <?php echo $course_name; ?>;
    

var ctx = document.getElementById("Chart10");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data_course_name,
        datasets: [{
            label: 'Studens',
            data: data_course_wise,
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