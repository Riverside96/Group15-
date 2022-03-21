<!DOCTYPE html>
<html lang="en">
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
            <h3 class="Title-Description">Submit Request Here</h3>
            <h3 class="Form-Title">General Request</h3>

            <form action="../process/create-request-form-process.php" method="POST">

                <div class="custom-select">
                    <select name="request">
                        <option style="display:none">Describe Request</option>
                        <option value="1">Request for password reset</option>
                        <option value="2">Request for access control</option>
                        <option value="3">Request for procurement</option>
                        <option value="4">Request for Standard Services</option>
                        <option value="5">Request for Non-Standard Services</option>
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