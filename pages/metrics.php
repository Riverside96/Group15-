<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../navigation/admindashnavbar.php';
    require ('../config/dbcon.php'); ?>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../navigation/admindashnavbar.css">
    <link rel="stylesheet" href="../css/admindash.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body bgcolor="#2E3746">

<div class="container rounded shadow" >
    <canvas class="m-40" style="padding-left: 20%" id="myChart"></canvas>
</div>


<script>
    let myChart = document.getElementById('myChart').getContext('2d');


    let chart1 = new Chart(myChart, {
        type:'bar', //bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data:{
            labels:['London', 'Birmingham', 'Leeds', 'Glasgow', 'Sheffield'],
            datasets:[{
                label:'Population',
                data:[7074265, 1020589, 726939, 616430, 530375
                ],
                backgroundColor:[
                   '#222',
                    '#333',
                    '#444',
                    '#555',
                    '#666'
                ],
                fontSize:80,
                borderWidth:2,
                borderColor:'#777',
                hoverBorderWidth:'3',
                hoverBorderColor:'black'

            }]
        },
        options:{
            plugins: {
            title: {
                display: true,
                text: 'custom text',
                padding: {
                    top: 10,
                    bottom: 30
                }
            }

            }
        }
    });

</script>

</body>
</html>
