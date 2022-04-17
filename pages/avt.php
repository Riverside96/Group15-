<!DOCTYPE html>
<html lang="en">
<head>
    <?php include'../navigation/admindashnavbar.php';
    require ('../config/dbcon.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <script src="luxon.js"></script>
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


        <!--Calculate Time Remaining (dictated by response)-->
        <!--===========================================================================================-->

        <?php
        $timelimit = '10 mins';
        $createdon = new DateTime("2022-04-18 23:15:33");
        $createdon->modify('+'.$timelimit.'');
        $date = $createdon->format('Y-m-d H:i:s');

        ?>

        <div id="data"></div>
        <input type="hidden" id="date" value="<?php echo $date; ?>">

        <script>
            function func(createdOnDate) {
                // var dateValue= document.getElementById("date").value;

                var date =  Math.abs((new Date().getTime() / 1000).toFixed(0));
                var date2 = Math.abs((new Date(createdOnDate).getTime() / 1000).toFixed(0));
                var diff = date2 - date;

                var days = Math.floor(diff / 86400);
                var hours = Math.floor(diff / 3600) % 24;
                var mins = Math.floor(diff / 60) % 60;
                var secs = diff % 60;


                // document.getElementById("data").innerHTML = days + " days, " + hours + ":" + mins + ":" + secs;
                if (days>=0) {
                    return days + " days, " + hours + ":" + mins + ":" + secs;
                } else {
                    return "late";
                }
            }


            const loopThroughTableRows = () => {
                const tableRows = Array.from(document.getElementsByTagName('tr'));
                tableRows.shift(); // removes first one, header

                tableRows.forEach(row => {
                    var rowCols = row.getElementsByTagName('td');
                    var createdOnDate = rowCols[3];
                    var timeLimit = rowCols[7];

                    createdDate = new Date(createdOnDate.innerText);

                    // var date = Math.abs((new Date(createdOnDate.innerText).getTime() / 1000).toFixed(0));
                    // var days = Math.floor(date / 86400);
                    // var hours = Math.floor(date / 3600) % 24;
                    // var mins = Math.floor(date / 60) % 60;
                    // var secs = date % 60;


                    // if time limit is in days, remove text, & add to creation date
                    var limitdays = timeLimit.innerText;
                    if (limitdays.includes(" days")) {
                        limitdays = limitdays.replace("days", "");
                        limitdays= parseInt(limitdays);

                        function addDaysToDate(createddate, days) {
                            var result = createddate;
                            result.setUTCDate(createddate.getDate()+days);
                            return result;
                        }

                        // format newdate to iso & remove unwanted characters
                        var newDate = addDaysToDate(createdDate, limitdays);
                        newDate = newDate.toISOString();
                        if (newDate.includes("T")) {
                            newDate = newDate.replace("T", " ");
                        }
                        if (newDate.includes(".000Z")) {
                            newDate = newDate.replace(".000Z", "");
                        }
                    };





                    const testRow = rowCols[8];
                    const timeDifference = func(newDate);
                    testRow.innerText = timeDifference;
                });
            }

            loopThroughTableRows();

            setInterval(loopThroughTableRows, 1000)
        </script>
    </table>
</body>
</html>