<script type="text/javascript">
   
   
    var data_student = <?php echo $student; ?>;
    var data_year = <?php echo $year; ?>;
    

var ctx = document.getElementById("Chart1");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: data_year,
        datasets: [{
            label: 'Studens Take Admissions',
            data: data_student,
             fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
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

 <script type="text/javascript">
   
   
    var female = <?php echo $female; ?>;
    var male = <?php echo $male; ?>;
    var data_year = <?php echo $year; ?>;
    

var ctx = document.getElementById("Chart7");
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


<script type="text/javascript">
   
   
    var data_course_wise = <?php echo $course_wise; ?>;
 
    var data_course_name = <?php echo $course_name; ?>;
    

var ctx = document.getElementById("Chart12");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: data_course_name,
        datasets: [{
            label: 'Studens',
            data: data_course_wise,
             fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
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

 <script type="text/javascript">
   
   
     var data_female_course = <?php echo $female_course; ?>;
    var data_male_course = <?php echo $male_course; ?>;
    var data_course_name = <?php echo $course_name; ?>;
    

var ctx = document.getElementById("Chart13");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: data_course_name,
        datasets: [{
            label: 'Female',
            data: data_female_course,
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
            data: data_male_course,
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

