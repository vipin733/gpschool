<script type="text/javascript">


    var data_course_wise = <?php echo $course_wise; ?>;

    var data_course_name = <?php echo $course_name; ?>;

    var data_color = ["#FF6384","#36A2EB","#FFCE56",'#E54320','#F5DC0B','#BB1AEA','#30B960','#EE0E8C','#808000','#3C25E3','#2B3D27','#CD853F','#DDA0DD','#663399','#FF0000','#C0C0C0','#DC143C','#FF4500','#FF8C00','#800080','#006400','#00FFFF','#181818','#267373'];


var ctx = document.getElementById("Chart16");
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    datasets: [{
            data: data_course_wise,
        backgroundColor:data_color,
        label: 'Students' // for legend
    }],
    labels: data_course_name
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
