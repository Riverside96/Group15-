
<!----------------------Create IT Ticket Backend Logic---------------------------- -->
<?php
session_start();
require ('../config/dbcon.php');
if(isset($_POST['submit']))
{


    date_default_timezone_set('Europe/London');

    $user = $_SESSION['id'];
    $type = 'IT Support';
    $severity = '3';
    $brief = $_POST['brief'];
    $full = $_POST['full'];
    $status = 'Pending';
    $comment = 'N/A';
//    $createdon = date('m/d/y h:i a', time());
//    maybe change to display in the above format?
//    below format is for timeleft process
    $createdon = date('Y-m-d H:i:s', time());
    $updatedon = 'N/A';



    echo $createdon;

    $query = "INSERT INTO itticket (user, type, severity, brief, full, status, comment, createdon, updatedon) VALUES (:user, :type, :severity, :brief, :full, :status, :comment, :createdon, :updatedon)";
    $query_run = $conn->prepare($query);



    $data = [
        ':user' => $user,
        ':type' => $type,
        ':severity' => $severity,
        ':brief' => $brief,
        ':full' => $full,
        ':status' => $status,
        ':comment' => $comment,
        ':createdon' => $createdon,
        ':updatedon' => $updatedon,

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


