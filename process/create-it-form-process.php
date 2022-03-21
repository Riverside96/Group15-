<?php
require ('../config/dbcon.php');
if(isset($_POST['submit']))
{

    date_default_timezone_set('Europe/London');

    $type = 'IT Support';
    $severity = $_POST['severity'];
    $brief = $_POST['brief'];
    $full = $_POST['full'];
    $status = 'Pending';
    $createdon = date('m/d/y h:i a', time());

    echo $createdon;

    $query = "INSERT INTO itticket (type, severity, brief, full, status, createdon) VALUES (:type, :severity, :brief, :full, :status, :createdon)";
    $query_run = $conn->prepare($query);



    $data = [
        ':type' => $type,
        ':severity' => $severity,
        ':brief' => $brief,
        ':full' => $full,
        ':status' => $status,
        ':createdon' => $createdon,

    ];
    $query_execute = $query_run->execute($data);


    if($query_execute) {
        $_SESSION['message'] = "success!";
        header('Location:../pages/userdash.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Insertion Error!";
        header('Location: ../pages/userdash.php');
        exit(0);
    }

}


