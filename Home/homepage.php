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
               post = document.getElementById("message");
               tag = document.getElementById("tag");

               document.getElementById("output") += post;
               document.getElementById("message") = "";
          }


     </script>
</head>

<body>
     <div>
          <h1>Welcome to Chatta!</h1>
     </div>
     <div class ="jumbotron"></div>

     <button type = "button" onclick ="submitPost()">New Post</button>
     <input id ="message"> </input>






</body>


</html>
