<!DOCTYPE html>
<html lang="en">
<head>
    <?php include'../navigation/admindashnavbar.php';
    require ('../config/dbcon.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/1.30.1/date_fns.min.js" integrity="sha512-F+u8eWHrfY8Xw9BLzZ8rG/0wIvs0y+JyRJrXjp3VjtFPylAEEGwKbua5Ip/oiVhaTDaDs4eU2Xtsxjs/9ag2bQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../navigation/admindashnavbar.css">
    <link rel="stylesheet" href="../css/admintickettable.css">
    <link rel="stylesheet" href="../css/searchbox.css">


</head>
<body bgcolor="#2E3746">




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
            <th>Select</th>

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

                <td>
                    <a href="../pages/admin-select-ticket.php?id=<?= $data->id; ?>" class="selectbutton">Select</a>
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
</body>
</html>