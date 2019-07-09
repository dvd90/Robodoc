<?php
    include 'db/db.php';
    include "db/config.php";

    session_start();

    if($_GET['delete']){
        $query  = "DELETE FROM tbl_users_221 WHERE id='"
        . $_SESSION['user_id']
        . "'";

        $result = mysqli_query($connection , $query);

        $_SESSION['user_id'] = NULL;
        header('Location: index.php'); 
    }else{

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


    }

    // var_dump($_POST);
    // var_dump($_SESSION['user_id']);

