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
<title>Add a new service</title>
</head>

<body>
<form action="insert.php" method="POST">
Service name: <input type="text" name="name" id="name" value=""><br>
<?php 

$query = "SELECT * "; 
$query .= "FROM `category` ORDER BY `name` ASC;"; 
$result = mysqli_query($connection, $query); 
?><br>
<label for="categoryid">Category:</label>
<select id="categoryid" name="categoryid">
<?php
while ($category = mysqli_fetch_assoc($result)){ 
	$categoryname = $category["name"];
	$categoryid = $category["id"]; 
	echo "<option value='$categoryid'>$categoryname</option>"; 

}
?>
</select><br>
Address: <input type="text" name="address" id="address" value=""><br>
City: <input type="text" name="city" id="city" value=""><br>
Postcode: <input type="text" name="postcode" id="postcode" value=""><br>
Phone:  <input type="text" name="phone" id="phone" value=""><br>
Web:  <input type="text" name="web" id="web" value=""><br>
Contact:  <input type="text" name="contact" id="contact" value="">
<br>
<input type="submit" value="Add Service">

</form>
</body>
</html>
