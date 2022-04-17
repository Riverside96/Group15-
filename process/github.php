<?php


$time= time();
echo $time;


//$timelimit = '10 mins';
//$createdon = ("2022-04-15 23:15:33");
//$createdon->modify('+'.$timelimit.'');
$createdon = 1650102989;
//
//$targetTime = 1649991600;
//echo timeLeft($createdon);

function timeLeft($timestamp) {

    $strTime = array("second", "minute", "hour", "day", "month", "year");
    $length = array("60","60","24","30","12","10");

    $currentTime = time();
    if($currentTime <= $timestamp) {
        $diff     = $timestamp-time();
        for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
        }


        $diff = round($diff);
        if ($diff == 1) {
            return $diff . " " . $strTime[$i] . " left ";
        }else{
            return $diff . " " . $strTime[$i] . "s left ";
        }
    }
}

timeLeft($createdon);


