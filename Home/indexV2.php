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
						<?php require_once "getTagsForDropdown.php"; ?>
          </ul>
     </div>

     <div class ="jumbotron" id="output">
			 	<?php require_once "getPosts.php"; ?>
		 </div>

     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Post</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Message</h4>
        </div>
        <div class="modal-body">
        	<form method="post" action = "../Posts/newContent.php">
              	<div class="form-group">
               		<label>Message</label>
               		<input type="text" class="form-control" name ="contentBody">
          		</div>
         	 <div class="form-group">
               <label>Tag</label>
               <input type ="text" class="form-control" name ="contentTag">
          	</div>
		 <button type="submit" name="newContent" class="btn btn-default">Submit</button>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</form>






</body>


</html>