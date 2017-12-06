<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('opentutorials');
$result = mysql_query('SELECT * FROM topic WHERE id = '.mysql_real_escape_string($_GET['id']));
$topic = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>   
    <body>
        <form action="./process.php?mode=modify" method="POST">
            <input type="hidden" name="id" value="<?=$topic['id']?>" />
            <p>Name : <input type="text" name="title" value="<?=htmlspecialchars($topic['title'])?>"></p>
            <p>Main : <textarea name="description" id="" cols="30" rows="10"><?=htmlspecialchars($topic['description'])?></textarea></p>
            <p><input type="submit" /></p>
        </form>
    </body>
</html>
