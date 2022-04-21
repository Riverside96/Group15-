<?php
require ('../process/CheckSession.php');
$path = "../pages/login.php";
session_start();
if (!isset($_SESSION['auth'])){
    session_unset();
    session_destroy();
    header("Location:".$path);
}
$auth = $_SESSION['auth'];
checkSession ($path);
?>
