<?php

  require_once "../Posts/dbConnect.php";

  $query = "SELECT DISTINCT tag FROM posts";

  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $tag = $row["tag"];

    echo "<li><a href='?tag=$tag'>$tag</a></li>";
  }

?>