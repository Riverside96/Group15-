<!DOCTYPE html>
<html lang="en">
<head>

    <!---------------- Login Page   ---------------------------- -->
    <?php include '../navigation/navbar.php';  
    require_once("../process/LoginCheck.php");
    $emailErr = $pwderr = $invalidMesg = "";
    if (isset($_POST['submit'])) {

  
        $array_user = verifyLogin(); 
        if ($array_user != null) {
            
            if ($array_user[0]["User"] == 'it'){
                session_start();
                $_SESSION['id'] = $array_user[0]["id"];
                
                header("Location: ../pages/admindash.php");
                exit;
            }
            if ($array_user[0]["User"] == 'user'){
                session_start();
                $_SESSION['id'] = $array_user[0]["id"];
                
                header("Location: ../pages/userdash.php");
                exit;
            }
            
            
            
        }
       
    }

    ?>
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
        <form method="post"> 
            <div class="input-group">
                <label>Email</label>
                <input type="email" name = "email">
                <span class="text-danger"><?php echo $emailErr; ?></span>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name = "password">
                <span class="text-danger"><?php echo $pwderr; ?></span>
            </div>
            <button  type="submit" value="submit" class="login-button" name="submit">Enter</button>
                <span class="text-danger"><?php echo $invalidMesg; ?></span>
            </div>

        </form>
    </div>
</div>
</body>
</html>