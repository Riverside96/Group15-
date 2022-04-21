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

        $query = "select 
               itticket.id,
               itticket.type,
               itticket.brief,
               itticket.createdon,
               itticket.status,
               itsupportservices.severity,
               itsupportservices.response, 
               itsupportservices.recovery,
               itticket.full
        from itticket
        left join itsupportservices
        on itticket.severity=itsupportservices.id
        WHERE itticket.id = :id";
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
            <th>Brief Description</th>
            <th>Open Date</th>
            <th>Status</th>
            <th>Severity</th>
            <th>Response</th>
            <th>Recovery</th>
            <th>Full Description</th>
            <th>Select</th>
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
                <td style = "display: none";><?= $data->response; ?> </td>
                <td style="display: none";><?= $data->recovery; ?> </td>
                <td><?= $test; ?> </td>
                <td><?= $responsetest; ?> </td>
                <td><?= $data->full; ?> </td>
                <td>
                    <a href="../pages/admin-set-ticket-status.php?id=<?= $data->id; ?>" class="setstatus">Set Status</a>
                </td>
                
            </tr>

            <?php
        }
        ?>

        <!--JS Countdown Timer's Call-->
        <!--===========================================================================================-->
        <script type="text/javascript" src="../js/formatDate.js"></script>
        <script type="text/javascript" src="../js/breakdownDate.js"></script>
        <!--Calculate Time Remaining (dictated by response)-->
        <!--===========================================================================================-->
        <script>
            const loopThroughTableRows = () => {
                const tableRows = Array.from(document.getElementsByTagName('tr'));
                tableRows.shift(); // removes first one, header

                tableRows.forEach(row => {
                    var rowCols = row.getElementsByTagName('td');
                    var createdOnDate = rowCols[3];
                    var timeLimit = rowCols[6];
                    newDate = formatDate(createdOnDate, timeLimit);
                    const result = rowCols[8];
                    const timeDifference = breakdownDate(newDate);
                    result.innerText = timeDifference;
                });
            }
            loopThroughTableRows();
            setInterval(loopThroughTableRows, 1000)
        </script>

        <!--Calculate Time Remaining (dictated by recovery)-->
        <!--===========================================================================================-->
        <script>
            const loopThroughTableRows2 = () => {
                const tableRows = Array.from(document.getElementsByTagName('tr'));
                tableRows.shift(); // removes first one, header

                tableRows.forEach(row => {
                    var rowCols = row.getElementsByTagName('td');
                    var createdOnDate = rowCols[3];
                    var timeLimit = rowCols[7];
                    newDate = formatDate(createdOnDate, timeLimit);
                    const result = rowCols[9];
                    const timeDifference = breakdownDate(newDate);
                    result.innerText = timeDifference;
                });
            }
            loopThroughTableRows2();
            setInterval(loopThroughTableRows2, 1000)
        </script>
        <!--===========================================================================================-->





    </table>

</div>
</body>
</html>