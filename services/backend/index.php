<?php
session_start(); 
?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<?php
if (isset($_POST['submit'])){
	if (htmlentities($_POST['username'])=="theusername"){ 
		if (htmlentities($_POST['password'])=="thepassword"){ 
			// Log is successful 
			$_SESSION['loggedin'] = true; 
			$_SESSION['username'] = "theusername"; 
			// Redirect to overview page 
			header('Location: overview.php'); 
			exit; 
		}
	}
echo "There was a problem with your username and/or password. Please try again."; 
	
} 
?>

<form action="" method="POST">
<label for="username">Username:</label><input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])){
	echo $_POST['username']; 
	} ?>"><br>
<label for="password">Password:</label><input type="password" name="password" id="password"><br>
<input type="submit" value="Log in" id="submit" name="submit"> 
</form>

</body>
</html>
