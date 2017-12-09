<?php

  session_start();

  require_once "../Posts/dbConnect.php";

  $query = "SELECT * FROM posts";

  if(isset($_GET["tag"])) {
    $query .= " WHERE tag = '" . $_GET["tag"] . "'";
  }

  //sort by datetime
  $query .= " ORDER BY uploadTime DESC";

  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["contentID"];
    $userId = $row["id"];
    $content = $row["content"];
    $tag = $row["tag"];
    $uploadTime = $row["uploadTime"];

    //get username from user id
    $userQuery = "SELECT username FROM users WHERE id = $userId";
    $userResult = mysqli_query($db, $userQuery);
    $userRow = mysqli_fetch_assoc($userResult);
    $username = $userRow["username"];

    //format date string
    $date = date_create_from_format('Y-m-d H:i:s', $uploadTime);
    $dateString = "Posted on " . $date->format('F jS, Y') . " at " . $date->format('g:i a');

    //build html
    echo "<div class='media message' id='post-$id'>";
    echo "<div class='media-body'>";
    echo "<h4 class='media-heading'>$username</h4>";
    echo "<small><i></i>$dateString - <a href='?tag=$tag'>$tag</a></small>";
    echo "<p>$content</p>";

    //only allow edit/delete if its your post
    if($_SESSION["username"] == $username) {
      echo "<div class='btn-group'>";
      echo "<button type='button' class='btn btn-primary btn-xs' onclick='editPost($id)'>Edit</button>";
      echo "<button type='button' class='btn btn-primary btn-xs' onclick='deletePost($id)'>Delete</button>";
      echo "</div>";
    }

    echo "</div></div>";
  }

?>