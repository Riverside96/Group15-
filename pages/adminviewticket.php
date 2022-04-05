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

    <!--View IT Tickets-->
    <!--===========================================================================================-->
    <?php
    $query = "

select itticket.id, itticket.type, itticket.brief, itticket.createdon, itticket.status,
itsupportservices.severity, itsupportservices.response, itsupportservices.recovery
from itticket
left join itsupportservices
on itticket.severity=itsupportservices.id
order by itticket.createdon DESC;
";



    $statement = $conn->prepare($query);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_OBJ);
    $result = $statement->fetchAll();
    ?>

    <table class="ticket-table">

        <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Brief Description</th>
            <th>Open Date</th>
            <th>Status</th>
            <th>Severity</th>
            <th>Response</th>
            <th>Recovery</th>
            <th>test</th>
            <th>Select</th>

            <?php $test  = 10; ?>

        </tr>

        </thead>

        <?php foreach($result as $data) { ?>




            <tr>
                <td><?= $data->id; ?> </td>
                <td><?= $data->type; ?> </td>
                <td><?= $data->brief; ?> </td>
                <td><?= $data->createdon; ?> </td>
                <td><?= $data->status; ?> </td>
                <td><?= $data->severity; ?> </td>
                <td><?= $data->response; ?> </td>
                <td><?= $data->recovery; ?> </td>
                <td><?= $test; ?> </td>
                <td>
                    <a href="../pages/admin-select-ticket.php?id=<?= $data->id; ?>" class="selectbutton">Select</a>
                </td>
                
                
            </tr>

            <?php
        }
        ?>
    </table>

    <!--View General Requests-->
    <!--===========================================================================================-->
    <?php
    $query = "SELECT * FROM requestticket";
    $statement = $conn->prepare($query);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_OBJ);
    $result = $statement->fetchAll();
    ?>

    <table class="ticket-table" >

        <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Request Type</th>
            <th>Brief Description</th>
            <th>Open Date</th>
            <th>Status</th>
        </tr>
        </thead>

        <?php foreach($result as $data) { ?>
            <tr>
                <td><?= $data->id; ?> </td>
                <td><?= $data->type; ?> </td>
                <td><?= $data->request; ?> </td>
                <td><?= $data->brief; ?> </td>
                <td><?= $data->createdon; ?> </td>
                <td><?= $data->status; ?> </td>

            </tr>

            <?php
        }
        ?>
    </table>







</div>
</body>
</html>