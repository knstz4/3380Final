<?php
session_start();

// Define the database and info for later connection
$servername = "sql312.epizy.com";
$username = "epiz_21149710";
$password = "33803380";
$dbname = "epiz_21149710_chat";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Register user
if (isset($_POST['reg_user'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	
	$errors =[];

	// Form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}

	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}

	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	
       $check="SELECT count(*) FROM users WHERE username = '$username'";
       $rs = mysqli_query($db,$check);
       $data = mysqli_fetch_array($rs, MYSQLI_NUM);
       if ($data[0] >= 1)
       {
           array_push($errors, "User already exists");
       }

	// Register user if there are no errors in the form
	if (count($errors) == 0) {

		// Use password_hash function to encrypt the user password
		$password = password_hash($password_1, PASSWORD_DEFAULT);
		$query = "INSERT INTO users (username, email, password) 
				  VALUES('$username', '$email', '$password')";
		mysqli_query($db, $query);

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
	}

}

// Perform login process
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	$errors = [];

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {

		$query = "SELECT * FROM users WHERE username = '$username'";

		$result = mysqli_query($db, $query);

   		$row = mysqli_fetch_assoc($result);

  	    $password_data = $row['password'];
		
		if (password_verify($password, $password_data)) {
			
			$query = "SELECT * FROM users WHERE username='$username'";
			$results = mysqli_query($db, $query);
		
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}
        }
          

		else {
			array_push($errors, "Wrong username or password");
        }
      
       
	}
}

?>
