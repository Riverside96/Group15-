<?php
$timelimit = '10 mins';
$createdon = new DateTime("2022-04-18 23:15:33");
$createdon->modify('+'.$timelimit.'');
$date = $createdon->format('Y-m-d H:i:s');
echo $date;
?>
