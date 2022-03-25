<!DOCTYPE html>
<html lang="en">



<!---------------- View Outstanding Tickets (User) ---------------------------- -->
<head>
    <?php include'../navigation/userdashnavbar.php';
    require ('../config/dbcon.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../navigation/userdashnavbar.css">
    <link rel="stylesheet" href="../css/usertickettable.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body bgcolor="#2E3746">
<div class="full-screen-container">



                                  <!--View IT Tickets-->
    <!--===========================================================================================-->
    <?php
    session_start();
    $user = $_SESSION['id'];


    $query = "SELECT * FROM itticket where user = $user";
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
        <th>Severity</th>
        <th>Brief Description</th>
        <th>Full Description</th>
        <th> Open Date</th>
        <th>Status</th>

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
            <th>Full Description</th>
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
                <td><?= $data->full; ?> </td>
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