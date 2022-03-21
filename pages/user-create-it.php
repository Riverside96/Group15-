<!DOCTYPE html>
<html lang="en">

<!---------------- Creates IT Support Ticket---------------------------- -->
<head>
    <?php include'../navigation/userdashnavbar.php';  ?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../navigation/userdashnavbar.css">
    <link rel="stylesheet" href="../css/create-it-form.css">


</head>
<body bgcolor="#2E3746">
<div class="full-screen-container">

    <div class="full-screen-container">
        <div class="login-container">
            <h3 class="Title-Description">Submit request here</h3>
            <h3 class="Form-Title">IT Support</h3>

            <form action="../process/create-it-form-process.php" method="POST">

                <div class="custom-select">
                    <select name="severity">
                        <option style="display:none">Select Severity</option>
                        <option value="1">Critical Incident</option>
                        <option value="2">High Incident</option>
                        <option value="3">Medium Incident</option>
                        <option value="4">Low Incident</option>
                    </select>
                    <span class="custom-arrow"></span>
                </div>

                <div class="input-group">
                    <label>Enter Brief Description</label>
                    <textarea class="brief-description" name="brief" type="text"></textarea>
                </div>
                <div class="input-group">
                    <label>Enter Full Description </label>
                    <textarea class="full-description" name="full" type="text" style="width: 100%; height: 200px;"></textarea>
                </div>
                <button href="../pages/admindash.php" name="submit" type="submit" class="login-button">Submit</button>

            </form>

</div>
</body>
</html>