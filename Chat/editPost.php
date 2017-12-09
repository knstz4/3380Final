<?php

  require_once "../Posts/dbConnect.php";

  $title = $_POST['title'];
  $description  = $_POST['description'];
  $id = $_POST['id'];

  $query = "UPDATE posts SET content = '$title', tag = '$description' WHERE contentId = $id";

  mysqli_query($db, $query);
?>