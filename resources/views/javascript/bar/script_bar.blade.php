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

  