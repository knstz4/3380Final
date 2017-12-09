<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>


<html>

<head>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <title>Chatta</title>

     <script>

          function submitPost() {

               var output;
               output = document.getElementById("message").innerHTML;
               tag = document.getElementById("tag");

               document.getElementById("output") = output;
               document.getElementById("message") = "";
          }


     </script>
</head>

<body>
     <div>
          <h1>Welcome to Chatta!</h1>
     </div>

     <div class = "dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Discussion Board
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
               <li><a href="#">Board 1</a></li>
               <li><a href="#">Board 2</a></li>
               <li><a href="#">Board 3</a></li>
          </ul>
     </div>

     <div class ="jumbotron" id="output"></div>

     <form method="post" action= "../Posts/newContent.php">
          <div class="form-group">
               <label>Message</label>
               <input type="text" class="form-control" name="contentBody">
          </div>
          <div class="form-group">
               <label>Tag</label>
               <input type ="text" class="form-control" name="contentTag">
          </div>
		 		<button type="submit" name="newContent" class="btn btn-default">Submit</button>
       			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		</form>






</body>


</html>