<?php

// variable declaration
$servername = "sql303.epizy.com";
$username = "epiz_20659244";
$password = "rwShlqy4Tn";
$dbname = "epiz_20659244_albumProject";
// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

//check for flag
if isset($_POST['newContent']) {
    //grab variables from post array
    $body = mysqli_real_escape_string($db, $_POST['contentBody']);
    $tag = mysqli_real_escape_string($db, $_POST['contentTag']);

    //get user id from username
    $username = $_SESSION['username'];
    $userQuery = "SELECT id FROM users WHERE username = '$username'";

    $userResult = mysqli_query($db, $userQuery);
    $userRow = $userResult->fetch_row();
    $userId = $userRow["id"];

    $query = "INSERT INTO posts (id, content, tag, uploadTime) VALUES ($userId, '$body', '$tag', now())";

    mysqli_query($db, $query);
}


?>