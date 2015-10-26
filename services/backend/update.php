<?php 
session_start(); 
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true)){ 
	// There was a problem, redirect to login page
	header('Location: index.php'); 
	exit; 
}
?>
<?php

// 1. Create database connection 
$dbhost = "localhost"; 
$dbuser = "whdc_admin"; 
$dbpass = "whdc_password"; 
$dbname = "whdc_services"; 
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
// Test if connection succeeded
if (mysqli_connect_errno()){ 
	die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" ); 
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
if(!isset($_POST['id'])){ 
	header("Location: overview.php"); /* Redirect browser */
	exit();
} else { 
$id = mysqli_real_escape_string($connection, $_POST['id']); 
$name = mysqli_real_escape_string($connection, $_POST['name']); 
$address = mysqli_real_escape_string($connection, $_POST['address']); 
$city = mysqli_real_escape_string($connection, $_POST['city']); 
$postcode = mysqli_real_escape_string($connection, $_POST['postcode']); 
$phone = mysqli_real_escape_string($connection, $_POST['phone']); 
$web = mysqli_real_escape_string($connection, $_POST['web']); 
$contact = mysqli_real_escape_string($connection, $_POST['contact']); 
$categoryid = mysqli_real_escape_string($connection, $_POST['categoryid']); 
$query = "UPDATE service SET "; 
$query .= "name = '{$name}', "; 
$query .= "category_id = '{$categoryid}', "; 
$query .= "address = '{$address}', "; 
$query .= "city = '{$city}', "; 
$query .= "postcode = '{$postcode}', "; 
$query .= "phone = '{$phone}', "; 
$query .= "web = '{$web}', "; 
$query .= "contact = '{$contact}' "; 
/* $query. = "categoryid = '{$categoryid}', "; */
$query .= "WHERE id = '{$id}'; "; 
$result = mysqli_query($connection, $query); 
// Test if there was a query error 
if (!$result){ 
	die("Database query failed."); 
} else { 
	header("Location: overview.php"); /* Redirect browser */
	exit();
}
}
?> 
<?php

//* echo $id . "<br>" . $name . "<br>" . $address . "<br>" . $city . "<br>" . $postcode . "<br>" . $phone . "<br>" . $web;  */ 

?>
</body>
</html>
