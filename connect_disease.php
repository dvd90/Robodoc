<?php
    include 'db/db.php';
    include "db/config.php";
    session_start();

    $query = "INSERT INTO tbl_diseases_221 (name, user_id)
          VALUES ('"
          . $_POST["disease"] . "', '"
          . $_SESSION["user_id"] . "')";

    $result = mysqli_query($connection , $query);


    header('Location: dashboard.php');
