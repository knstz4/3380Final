<?php
$conn = mysqli_connect("sql309.epizy.com", "epiz_20707449", "28302830", "epiz_20707449_CS2830");
mysqli_select_db($conn, "opentutorials");
$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="target">
    <header>
        <h1><a href="http://localhost/index.php">About Web Application</a></h1>
  </header>
    <nav>
        <ol>
    <?php
    while( $row = mysqli_fetch_assoc($result)){
      echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
    }
    ?>
        </ol>
    </nav>
  <div id="control">
    <input type="button" value="white" onclick="document.getElementById('target').className='white'"/>
    <input type="button" value="black" onclick="document.getElementById('target').className='black'" />
    <a href="http://localhost/write.php">Write</a>
  </div>
  <article>
    <form action="process.php" method="post">
      <p>
        Title : <input type="text" name="title">
      </p>
      <p>
        Writer : <input type="text" name="author">
      </p>
      <p>
        Main : <textarea name="description"></textarea>
      </p>
      <input type="submit" name="name">
    </form>
  </article>
</body>
</html>