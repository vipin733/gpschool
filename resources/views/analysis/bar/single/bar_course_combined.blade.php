<script type="text/javascript">
   
    var data_female_course = <?php echo $female_course; ?>;
    var data_male_course = <?php echo $male_course; ?>;
    var data_course_name = <?php echo $course_name; ?>;
    

var ctx = document.getElementById("Chart11");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data_course_name,
        datasets: [{
            label: 'Female',
            data: data_female_course,
            backgroundColor:'#6e3d0e',
            hoverBackgroundColor:'#6e3d0e', 
            borderWidth: 1
        },{
            label: 'Male',
            data: data_male_course,
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
