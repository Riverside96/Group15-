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
    <link rel="stylesheet" href="../css/admintickettable.css">
    <link rel="stylesheet" href="../css/user-select-button.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</head>
<body bgcolor="#2E3746">




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
            <th>Open Date</th>
            <th>Updated On</th>
            <th>Comment</th>
            <th>Created On</th>
            <th>Status</th>
            <th>Select</th>
        </tr>
        </thead>

        <?php foreach($result as $data) { ?>
            <tr>
                <td><?= $data->id; ?> </td>
                <td><?= $data->type; ?> </td>
                <td><?= $data->severity; ?> </td>
                <td><?= $data->brief; ?> </td>
                <td><?= $data->createdon ?> </td>
                <td><?= $data->updatedon; ?> </td>
                <td><?= $data->comment; ?> </td>
                <td><?= $data->createdon; ?> </td>
                <td><?= $data->status; ?> </td>
                <td>
                    <a style="text-decoration: none;" href="../pages/user-select-it-ticket.php?id=<?= $data->id; ?>" class="selectbutton">Select</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

</body>
</html>