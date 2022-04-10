
<!----------------------Edit Ticket Status Backend Logic---------------------------- -->
<?php
session_start();
$ticketID = $_SESSION['ticketID'];
require ('../config/dbcon.php');
if(isset($_POST['submit']))
{


    date_default_timezone_set('Europe/London');


    $status = $_POST['status'];
    $comment = $_POST['comment'];
    $updatedon = date('m/d/y h:i a', time());


    $query = "UPDATE requestticket SET status=:status, comment=:comment, updatedon=:updatedon WHERE id=$ticketID";
    $query_run = $conn->prepare($query);



    $data = [

        ':status' => $status,
        ':comment' => $comment,
        ':updatedon' => $updatedon,

    ];
    $query_execute = $query_run->execute($data);


    if($query_execute) {
        $_SESSION['message'] = "success!";
        header('Location:../pages/adminviewticket.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Insertion Error!";
        header('Location: ../pages/adminviewticket.php');
        exit(0);
    }

}


