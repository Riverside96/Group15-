
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
    $query = "SELECT * FROM Users";
    $statement = $conn->prepare($query);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_OBJ);
    $result = $statement->fetchAll();
    ?>

    <table class="ticket-table">

        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>User Type</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>View</th>
        </tr>

        </thead>

        <?php foreach($result as $data) { ?>
            <tr>
                <td><?= $data->id; ?> </td>
                <td><?= $data->Email; ?> </td>
                <td><?= $data->User; ?> </td>
                <td><?= $data->fname; ?> </td>
                <td><?= $data->lname ?> </td>
                <td>
                    <a href="../pages/edit-user.php?id=<?= $data->id; ?>" class="selectbutton">Select</a>
                </td>


            </tr>

            <?php
        }
        ?>
    </table>






</div>
</body>
</html>