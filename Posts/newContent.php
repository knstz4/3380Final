<?php

// variable declaration
$servername = "sql312.epizy.com";
$username = "epiz_21149710";
$password = "33803380";
$dbname = "epiz_21149710_chat";
// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

//check for flag
if isset($_POST['newContent']) {
    //grab variables from post array
    $body = mysqli_real_escape_string($db, $_POST['contentBody']);
    $tag = mysqli_real_escape_string($db, $_POST['contentTag']);

    //get user id from username
    $username = $_SESSION['username'];
    $userQuery = "SELECT id FROM users WHERE username = 'benthrasher5'";

    $userResult = mysqli_query($db, $userQuery);
    $userRow = $userResult->fetch_row();
    $userId = $userRow["id"];

    $query = "INSERT INTO posts (id, content, tag, uploadTime) VALUES ($userId, '$body', '$tag', now())";

    mysqli_query($db, $query);
}


?>
