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
    <link rel="stylesheet" href="../css/accounts.css">
    <link rel="stylesheet" href="../css/create-user.css">

</head>
<body bgcolor="#2E3746">
<div class="full-screen-container">

    <div class="full-screen-container">
        <div class="login-container">
            <h3 class="login-title">Create User</h3>


                <form action="../process/create-user-process.php" method="POST">

                <div class="input-group">
                    <label>Email</label>
                    <input required type="email" name = "email">
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input required type="password" name = "password">
                </div>

                <div class="input-group">
                    <label>First Name</label>
                    <input required type="text" name = "fname">
                </div>

                <div class="input-group">
                    <label>Last Name</label>
                    <input required type="text" name = "lname">
                </div>

                <div class="custom-select">
                    <select required name="user">
                        <option value="" style="display:none">User Type</option>
                        <option value="user">User</option>
                        <option value="it">IT Team</option>

                    </select>
                    <span class="custom-arrow"></span>
                </div>

                <button  type="submit" value="submit" class="login-button" name="submit">Enter</button>

        </div>

        </form>
    </div>
</div>



</div>
</body>
</html>
