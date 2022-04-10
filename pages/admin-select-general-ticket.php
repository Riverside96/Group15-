<!DOCTYPE html>
<html lang="en">
<head>
    <?php include'../navigation/admindashnavbar.php';
    require ('../config/dbcon.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../navigation/admindashnavbar.css">
    <link rel="stylesheet" href="../css/admintickettable.css">


</head>
<body bgcolor="#2E3746">
<div class="full-screen-container">

    <!--View Selected Ticket-->
    <!--===========================================================================================-->
    <?php


    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        session_start();
        $ticketid = $id;
        $_SESSION['ticketID'] = $ticketid;

        $query = "SELECT requestticket.id, 
                         Users.fname ||' '|| Users.lname AS name, 
                         generalrequest.requestdescription,
                         requestticket.brief,
                         requestticket.full,
                         requestticket.createdon, 
                         generalrequest.response, 
                         requestticket.comment,
                         requestticket.status

              FROM requestticket
              LEFT JOIN generalrequest
              ON requestticket.request=generalrequest.id
              LEFT JOIN Users 
              ON requestticket.user = Users.id
              WHERE requestticket.id = :id";


        $statement = $conn->prepare($query);
        $data = [':id' => $id,];
        $statement->execute($data);

        $statement->setFetchMode(PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
    };
    ?>

    <table class="ticket-table">

        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Request Type</th>
            <th>Brief</th>
            <th>Description</th>
            <th>Creation Date</th>
            <th>Response Time</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Select</th>

        </tr>

        </thead>

        <?php foreach($result as $data) { ?>
            <tr>
                <td><?= $data->id; ?> </td>
                <td><?= $data->name; ?> </td>
                <td><?= $data->requestdescription; ?> </td>
                <td><?= $data->brief; ?> </td>
                <td><?= $data->full; ?> </td>
                <td><?= $data->createdon; ?> </td>
                <td><?= $data->response; ?> </td>
                <td><?= $data->comment; ?> </td>
                <td><?= $data->status; ?> </td>
                <td>
                    <a href="admin-set-general-ticket-status.php?id=<?= $data->id; ?>" class="setstatus">Set Status</a>
                </td>
                
                
            </tr>

            <?php
        }
        ?>
    </table>

</div>
</body>
</html>