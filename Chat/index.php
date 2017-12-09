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
		 <link rel="stylesheet" href="../Home/homestyle.css">

<!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <title>Chatta</title>

		 <script type="text/javascript">
		 		function deletePost(id) {
					//remove html
					var myNode = document.getElementById("post-" + id);
					myNode.innerHTML = '';

					//call php delete file
					$.get("deletePost.php?id=" + id, function (data) {
						myNode.innerHTML = data;
					});
				}

				function editPost(id) {
					var oldContent = $("#post-" + id + " p").html();
					var oldTag = $("#post-" + id + " a").html();

					//set modal inputs
					document.getElementById("editContentBody").value = oldContent;
					document.getElementById("editContentTag").value = oldTag;

						$('#editModal').modal('toggle');

						document.getElementById("editSubmit").onclick = function() {
							submitEdit(id);

													$('#editModal').modal('toggle');
						};

				}

				function submitEdit(id) {
					var content = document.getElementById("editContentBody").value;
					var tag = document.getElementById("editContentTag").value;

					$.post("editPost.php", {
						id: id,
						title: content,
						description: tag
					});

					$("#post-" + id + " p").html(content);
					$("#post-" + id + " a").html(tag);
				}

				function submitPost() {
						//get content, body,
						var content = document.getElementById("contentBody").value;
						var tag = document.getElementById("contentTag").value;

						//post to php file
						$.post("../Posts/newContent.php", {
							newContent: true,
							contentBody: content,
							contentTag: tag
						});

						//close Modal
						$('#myModal').modal('toggle');
				}

		 </script>


</head>

<body>



<div>
     <div class="btn-group">
          <a href="index.php" class="btn btn-primary btn-xs">Home</a>
          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">New Post</button>
          <a href="https://github.com/knstz4/3380Final" class="btn btn-primary btn-xs">GitHub</button>
          <a href="index.php?logout='1'" style="color: red" class="btn btn-primary btn-xs">Logout</a></a>

          <h1>Welcome to Chatta!</h1>
     </div>

     <div class = "dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tags
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
               <?php require_once "getTagsForDropdown.php"; ?>
          </ul>
     </div>

     <div class ="jumbotron" id="output">
			 <?php require_once "getPosts.php"; ?>
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
              	<div class="form-group">
               		<label>Message</label>
               		<input type="text" class="form-control" name ="contentBody" id="contentBody">
          		</div>
         	 <div class="form-group">
               <label>Tag</label>
               <input type ="text" class="form-control" name ="contentTag" id="contentTag">
          	</div>
		 <button type="submit" name="newContent" class="btn btn-default" onclick="submitPost()">Submit</button>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

	<!-- edit modal -->
	<div class="modal fade" id="editModal">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Message</h4>
				</div>
				<div class="modal-body">
								<div class="form-group">
									<label>Message</label>
									<input type="text" class="form-control" name ="contentBody" id="editContentBody">
							</div>
					 <div class="form-group">
							 <label>Tag</label>
							 <input type ="text" class="form-control" name ="contentTag" id="editContentTag">
						</div>
		 <button type="submit" name="newContent" class="btn btn-default" id="editSubmit">Submit</button>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>





</body>


</html>