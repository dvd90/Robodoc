<?php

  function getUser($id) {
    $query = "SELECT name FROM tbl_users_221 WHERE id='"
      .$id
      ."'";
    $result = mysqli_query($connection , $query);
    $row    = mysqli_fetch_array($result);
    return $row;
  }
