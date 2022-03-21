<?php
function verifyLogin () {
    if (!isset($_POST['email']) or !isset($_POST['password'])){
        return;  // <-- return null;  
    }

    $db = new SQLite3('C:\xampp\xamppfiles\data\it\Users.db');
    $stmt = $db->prepare('SELECT User FROM Users WHERE Email=:email AND Password=:password');
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);
 
    $result = $stmt->execute();
    $rows_array = [];
    while ($row=$result->fetchArray())
    {
        $rows_array[]=$row;
    }
    return $rows_array;
}