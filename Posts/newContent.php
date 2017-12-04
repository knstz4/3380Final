<?php

session_start();

require_once "dbConnect.php";

//check for flag
if (isset($_POST['newContent'])) {
    //grab variables from post array
    $body = mysqli_real_escape_string($db, $_POST['contentBody']);
    $tag = mysqli_real_escape_string($db, $_POST['contentTag']);



    //get user id from username
    $username = $_SESSION['username'];
    $userQuery = "SELECT id FROM users WHERE username = '$username'";

    $userResult = mysqli_query($db, $userQuery);
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow["id"];

    $query = "INSERT INTO posts (id, content, tag, uploadTime) VALUES ($userId, '$body', '$tag', now())";

    mysqli_query($db, $query);

    echo "<h1>The following was posted</h1><br>Body: $body<br>Tag: $tag<br>";
}

?>
