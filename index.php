<?php
include 'config.php';
$host = $protocol . $_SERVER['HTTP_HOST'];

// Create connection
$conn = new mysqli($servername, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


// Managing data in browser with js, it's just me no need to make it scaleable right? ¯\_(ツ)_/¯
$sqlF = 'SELECT * FROM `Personal_records`';
$sqlW = 'SELECT * FROM `Weight_records`';
$resultF = $conn->query($sqlF);
$resultW = $conn->query($sqlW);
echo $resultF;
echo $resultW;
$conn->close();
echo "test";
?>
<?php include 'head.php'; ?>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var fitnes = <?php echo $resultF;?>;
var weight = <?php echo $resultW;?>;
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

</body>
