<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../navigation/userdashnavbar.php';
    include("../process/CheckSession.php");
 
    $path = "../pages/login.php";
   
    session_start();
    if (!isset($_SESSION['id'])){
        session_unset();
        session_destroy();
        header("Location:".$path);
    }
    $user = $_SESSION['id'];

    checkSession ($path);



     ?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../navigation/userdashnavbar.css">
    <link rel="stylesheet" href="../css/test.css">






</head>
<body bgcolor="#2E3746">
<div class="full-screen-container">





</div>
</body>
</html>