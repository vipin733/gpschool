 
   <script type="text/javascript">
   
    var data_student = <?php echo $student; ?>;
 
    var data_year = <?php echo $year; ?>;

    var data_color = ["#FF6384","#36A2EB","#FFCE56",'#E54320','#F5DC0B','#BB1AEA','#30B960','#EE0E8C','#808000','#3C25E3','#2B3D27','#201090','#15B5E3','#10BD2C'];
    

var ctx = document.getElementById("Chart4");
var myChart = new Chart(ctx, {
    type: 'pie',
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


