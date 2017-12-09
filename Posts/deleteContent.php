<?php

require_once "dbConnect.php";

//check for flag
if isset($_POST['deleteContent']) {
    //grab variables from post array
    $postId = mysqli_real_escape_string($db, $_POST['postId']);

    $query = "DELETE FROM posts WHERE postId = $postId";

    mysqli_query($db, $query);
}


?>