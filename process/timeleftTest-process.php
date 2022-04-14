<!doctype html>
<html lang="en">
<head>
    <?php require ('../config/dbcon.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Time Left test</title>
</head>
<body>


<?php
    date_default_timezone_set('Europe/London');

    $query= $conn->prepare("SELECT response FROM itsupportservices WHERE id = 1");
    $query->execute();
    $targetTime = ($query->fetchColumn());

    $query= $conn->prepare("SELECT CreatedOn FROM itticket WHERE id = 1");
    $query->execute();

    $then = new DateTime($query->fetchColumn());
    $now = new DateTime();
    $interval=date_diff($then, $now);
    $formattedInterval = $interval ->format('%d days %h hours %i minutes');
    echo $formattedInterval;



//    $timeRemaining = $targetTime - $interval;
//    $targetTime = (strtotime($targetTime));
//    $targetTime = date("d:m:i", $targetTime);
//
//    echo $targetTime;






//    echo $formattedInterval;

//    echo $interval->format('%d days %h hours %i mins');














?>






</body>
</html>


































