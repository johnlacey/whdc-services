<?php 
session_start(); 
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true)){ 
	// There was a problem, redirect to login page
	header('Location: index.php'); 
	exit; 
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Overview</title>
</head>

<body>
<?php
if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true)){ 
	echo "Hello " . $_SESSION['username'];
	echo " <a href='logout.php'>Log out?</a>";  
	echo "<br><br>"; 
}
?> 
<table border="1">
<tr>
<th>Name</td>
<th>Category</td>
<th>Address</td>
<th>City</td>
<th>Web</td>
<th>Edit</td>
<th>Delete</td>
</tr>
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
<?php 
$query = "SELECT service.name, service.category_id, service.id, service.address, service.city, service.postcode, service.phone, service.web, service.contact, category.id as catid, category.name as catname "; 
$query .= "FROM service INNER JOIN category ON service.category_id=category.id ";
$query .= " ORDER BY service.category_id ASC, service.name ASC;"; 
$result = mysqli_query($connection, $query); 
// Test if there was a query error 
if (!$result){ 
	die("Database query failed."); 
}
?> 
<?php 
// 3. Use returned data (if any) 
while ($service = mysqli_fetch_assoc($result)){ 
	$servicename = $service["name"];
	$servicecategoryid = $service["category_id"]; 
	$serviceid = $service["id"]; 
	$serviceaddress = $service["address"];
	$servicecity = $service["city"]; 
	$servicepostcode = $service["postcode"]; 
	$servicephone = $service["phone"]; 
	$serviceweb = $service["web"]; 
	$servicecontact = $service["contact"];
	$servicecategoryname = $service["catname"];  
?>
<tr>
<td><?php echo $servicename; ?></td>
<td><?php echo $servicecategoryname; ?></td>
<td><?php echo $serviceaddress; ?></td>
<td><?php echo $servicecity; ?></td>
<td><?php echo $serviceweb; ?></td>
<td>
<form action="edit.php" method="POST">
<input name="id" type="hidden" value="<?php echo $serviceid; ?>">
<input type="submit" value="Edit"></form></td>

<td><form action="delete.php" method="POST">
<input name="id" type="hidden" value="<?php echo $serviceid; ?>">
<input type="submit" value="Delete"></form></td>
</tr>
<?php
} 
?>
</table>
<a href="add.php">Add a new service</a>
</body>
</html>
