<?php

try {

    $conn = new PDO('sqlite:../database/supportproject.db');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



} catch (PDOException $e) {
    echo  "connection failure" .$e->getMessage();
}


