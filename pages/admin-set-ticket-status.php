<!DOCTYPE html>
<html lang="en">
<head>
<!--    --><?php //include'../navigation/admindashnavbar.php';
    require ('../config/dbcon.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../navigation/admindashnavbar.css">
    <link rel="stylesheet" href="../css/admintickettableOG.css">
    <link rel="stylesheet" href="../css/set-ticket-status-form.css">

    <?php
    session_start();
    $ticketID = $_SESSION['ticketID'];
    ?>


</head>
<body bgcolor="#2E3746">
<div class="full-screen-container">

<!--//===========================Update IT-Ticket Status Form=================================================================//-->
        <div class="login-container">
            <h3 class="Title-Description">Resolve tickets here</h3>
            <h3 class="Form-Title">Update IT Support Ticket</h3>

            <form action="../process/update-ticket-status-process.php" method="POST">

                <div class="custom-select">
                    <select required name="status">
                        <option value="" style="display:none">Set Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Active">Active</option>
                        <option value="Completed">Completed</option>
                    </select>
                    <span class="custom-arrow"></span>
                </div>

                <div class="custom-select">
                    <select required name="severity">
                        <option value="" style="display:none">Set Severity</option>
                        <option value="1">Critical Incident</option>
                        <option value="2">High Incident</option>
                        <option value="3">Medium Incident</option>
                        <option value="4">Low Incident</option>
                    </select>
                    <span class="custom-arrow"></span>
                </div>


                <div class="input-group">
                    <label>Add progression comment</label>
                    <textarea required class="full-description" name="comment" type="text" style="width: 100%; height: 200px;"></textarea>
                </div>

                <button href="../pages/admindash.php" name="submit" type="submit" class="login-button">Submit</button>

            </form>
        </div>
<!--//=====================================================================================================================//-->
</body>
</html>