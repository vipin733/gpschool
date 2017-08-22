<script type="text/javascript">
   
   
    var data_student = <?php echo $student; ?>;
 
    var data_year = <?php echo $year; ?>;

     var data_color = ["#FF6384","#36A2EB","#FFCE56",'#E54320','#F5DC0B','#BB1AEA','#30B960','#EE0E8C','#808000','#3C25E3','#2B3D27','#CD853F','#DDA0DD','#663399','#FF0000','#C0C0C0','#DC143C','#FF4500','#FF8C00','#800080','#006400','#00FFFF','#181818','#267373'];
    

var ctx = document.getElementById("Chart5");
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: data_year,
    datasets:[
        {
            data: data_student,
            backgroundColor: data_color,
            hoverBackgroundColor: data_color
        }]
    },
    options: {
        scales: {

            xAxes: [{
                gridLines: {
                    display:false
                }
            }]

        }
    }
});
</script>


<script type="text/javascript">
   
   
    var data_course_wise = <?php echo $course_wise; ?>;
 
    var data_course_name = <?php echo $course_name; ?>;

    var data_color = ["#FF6384","#36A2EB","#FFCE56",'#E54320','#F5DC0B','#BB1AEA','#30B960','#EE0E8C','#808000','#3C25E3','#2B3D27','#CD853F','#DDA0DD','#663399','#FF0000','#C0C0C0','#DC143C','#FF4500','#FF8C00','#800080','#006400','#00FFFF','#181818','#267373'];
    

var ctx = document.getElementById("Chart6");
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: data_course_name,
    datasets:[
        {
            data: data_course_wise,
            backgroundColor: data_color,
            hoverBackgroundColor:data_color
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