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

        $query = "SELECT * FROM itticket where id=:id ";
        $statement = $conn->prepare($query);
        $data = [':id' => $id];
        $statement->execute($data);

        $statement->setFetchMode(PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
    };
    ?>

    <table class="ticket-table">

        <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Severity</th>
            <th>Brief Description</th>
            <th>Full Description</th>
            <th>Open Date</th>
            <th>Status</th>
            <th>Set Status</th>

        </tr>

        </thead>

        <?php foreach($result as $data) { ?>
            <tr>
                <td><?= $data->id; ?> </td>
                <td><?= $data->type; ?> </td>
                <td><?= $data->severity; ?> </td>
                <td><?= $data->brief; ?> </td>
                <td><?= $data->full; ?> </td>
                <td><?= $data->createdon ?> </td>
                <td><?= $data->status; ?> </td>
                <td>
                    <a href="admin-set-ticket-status.php?id=<?= $data->id; ?>" class="setstatus">Set Status</a>
                </td>
                
                
            </tr>

            <?php
        }
        ?>
    </table>

</div>
</body>
</html>