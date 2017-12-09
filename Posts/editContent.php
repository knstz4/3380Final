<?php

require_once "dbConnect.php";

//check for flag
if isset($_POST['editContent']) {
    //grab variables from post array
    $newBody = mysqli_real_escape_string($db, $_POST['newBody']);
    $newTag = mysqli_real_escape_string($db, $_POST['newTag']);
    $postId = mysqli_real_escape_string($db, $_POST['postId']);

    $query = "UPDATE posts SET content = '$newBody', tag = '$newTag' WHERE postId = $postId";

    mysqli_query($db, $query);
}


?>