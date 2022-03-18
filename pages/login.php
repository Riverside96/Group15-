<!DOCTYPE html>
<html lang="en">
<head>
    <?php include'../navigation/navbar.php';  ?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../navigation/navbar.css">
    <link rel="stylesheet" href="../css/LoginForm.css">

</head>
<body>
<div class="full-screen-container">
    <div class="login-container">
        <h3 class="login-title">Sign In</h3>
        <form>
            <div class="input-group">
                <label>Email</label>
                <input type="email">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password">
            </div>
            <button href="../pages/admindash.php" type="submit" class="login-button">Enter</button>

        </form>
    </div>
</div>
</body>
</html>