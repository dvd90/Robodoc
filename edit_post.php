<?php
    include 'db/db.php';
    include "db/config.php";

    session_start();

    // var_dump($_POST);
    // var_dump($_SESSION['user_id']);

    $query  = "UPDATE tbl_users_221 SET email='"
        . $_POST["editEmail"]
        . "', password='"
        . $_POST["editPassword"]
        . "', name='"
        . $_POST["editName"]
        . "', phone='"
        . $_POST["editPhone"]
        . "', address='"
        . $_POST["editAddress"]
        . "' WHERE id='"
        . $_SESSION['user_id']
        . "'";

    $result = mysqli_query($connection , $query);



    header('Location: dashboard.php');
