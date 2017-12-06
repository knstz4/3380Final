<?php
$conn = mysqli_connect("sql309.epizy.com", "epiz_20707449", "28302830", "epiz_20707449_CS2830");
mysqli_select_db($conn, "opentutorials");
$sql = "INSERT INTO topic (title,description,author,created) VALUES('".$_POST['title']."', '".$_POST['description']."', '".$_POST['author']."', now())";
$result = mysqli_query($conn, $sql);
header('Location: http://localhost/index.php');
?>