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


</head>

<body>



<div>
     <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs">Home</button>
          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">New Post</button>
          <button type="button" class="btn btn-primary btn-xs">GitHub</button>
          <a href="index.php?logout='1'" style="color: red" class="btn btn-primary btn-xs">Logout</a></a>

          <h1>Welcome to Chatta!</h1>
     </div>

     <div class = "dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tags
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
               <li><a href="#">Board 1</a></li>
               <li><a href="#">Board 2</a></li>
               <li><a href="#">Board 3</a></li>
          </ul>
     </div>

     <div class ="jumbotron" id="output">


          <div class="media" style="padding-left: 20px" >

               <div class="media-body">
                    <h4 class="media-heading">John Doe</h4> <small><i>Posted on February 19, 2016 at 03:46 p.m.- <a href="url">Tag</a></i></small></h4></h4>
                    <p>Johns message goes here</p>
                    <div class="btn-group">
                         <button type="button" class="btn btn-primary btn-xs">Edit</button>
                         <button type="button" class="btn btn-primary btn-xs">Delete</button>
                    </div>
               </div>
          </div>


     </div>



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
        	<form method="post" action = "../Post/newContent.php">
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
