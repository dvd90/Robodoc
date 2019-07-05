<?php
    include 'db/db.php';
    include "db/config.php";

    $query = "INSERT INTO tbl_users_221 (name, email, address, phone, password)
          VALUES ('"
          . $_POST["name"] . "', '"
          . $_POST["email"] . "', '"
          . $_POST["address"] . "', '"
          . $_POST["phone"] . "', '"
          . $_POST["password"] . "')";


    $result = mysqli_query($connection , $query);


    if($result){
        $query  = "SELECT * FROM tbl_users_221 WHERE email='"
        . $_POST["email"]
        . "' and password='"
        . $_POST["password"]
        ."'";
        $result = mysqli_query($connection , $query);
        $row = mysqli_fetch_array($result);
    }

    header('Location: dashboard.php?new_user='.$row['id']);
