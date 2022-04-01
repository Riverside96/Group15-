<?php
session_start();
$id  = $_SESSION['id'];
    require ('../config/dbcon.php');
if (isset($_POST['submit'])) {

    $password = $_POST['password'];

    $query = "UPDATE Users SET password=:password WHERE id=$id";

    $statement = $conn->prepare($query);

    $data = [
        ':password' => $password,


    ];
    $query_execute =$statement->execute($data);


    if($query_execute) {
        $_SESSION['message'] = "success!";
        header('Location:../pages/view-users.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Insertion Error!";
        header('Location: ../pages/view-users.php');
        exit(0);
    }




}