<?php

  require_once "../Posts/dbConnect.php";

  if(isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "DELETE FROM posts WHERE contentId = " . $id;

    mysqli_query($db, $query);
  } 

?>