<!----------------------Create IT Ticket Backend Logic---------------------------- -->
<?php
session_start();
require ('../config/dbcon.php');
if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user = $_POST['user'];


    $query = "INSERT INTO Users (Email, password, fname, lname, User) VALUES (:email, :password, :fname, :lname, :user)";
    $query_run = $conn->prepare($query);


        $data = [
        ':email' => $email,
        ':password' => $password,
        ':fname' => $fname,
        ':lname' => $lname,
        ':user' => $user,
    ];
    $query_execute = $query_run->execute($data);


    if($query_execute) {
        $_SESSION['message'] = "success!";
        header('Location:../pages/userdash.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Insertion Error!";
        header('Location: ../pages/userdash.php');
        exit(0);
    }



}