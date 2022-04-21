<!DOCTYPE html>
<html lang="en">
<head>
<!--    --><?php //include '../navigation/admindashnavbar.php';
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

<?php
$query = "SELECT user FROM itticket";
$statement = $conn->prepare($query);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);  //both = array
$result = $statement->fetchAll();
$json = json_encode($result);

//try{
//$sql = "SELECT * FROM itticket";
//$result = $conn->query($sql);
//if($result->rowCount() > 0) {
//    $status=array();
//
//    while($row = $result->fetchAll()) {
//    $status[] = $row["status"];
//}
//    unset($result);
//}  else {
//    echo "No results found";
//    }
//} catch (PDOException $e){
//    die("ERROR: could not execute sql" .$e->getMessage());
//}
//echo print_r($status);

//echo print_r($result);
//echo json_encode($result);
//echo print_r(json_encode($result));
//echo json_encode(array_values($result));
//header("Content-type: application/json; charset=utf-8");
?>

<script>
      const statusJSON =  <?php echo json_encode($result); ?>;
      const formatted = JSON.parse(statusJSON);
</script>

<div class="container rounded shadow" >
    <canvas class="m-40" style="padding-left: 20%" id="myChart"></canvas>
</div>

<script>
                // Setup Block
              //convert array to json for JS to read

                const data =
                {
                    labels:['London', 'Birmingham', 'Leeds', 'Glasgow', 'Sheffield'],
                        datasets:
                    [{
                        label: 'Population',
                        data: ['10', '5', '4', '3', '2'],
                        // data: statusJSON,
                        backgroundColor: [
                            '#222',
                            '#333',
                            '#444',
                            '#555',
                            '#666'
                        ],
                        fontSize: 80,
                        borderWidth: 2,
                        borderColor: '#777',
                        hoverBorderWidth: '3',
                        hoverBorderColor: 'black'
                    }]
                };
                        // Config Block
                const config = {
                    type: 'bar', //bar, horizontalBar, pie, line, doughnut, radar, polarArea
                    data,
                    options: {
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
                };

                //Render Block
         const myChart = new Chart(
             document.getElementById('myChart'),
             config
         );


</script>

</body>
</html>
