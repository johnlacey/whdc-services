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

} else { 
$query = "SELECT * "; 
$query .= "FROM `service` WHERE `id`='";
$query .= $_POST['id']; 
$query .= "' ORDER BY `name` ASC LIMIT 1;"; 
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
	$serviceid = $service["id"]; 
	$serviceaddress = $service["address"];
	$servicecity = $service["city"]; 
	$servicepostcode = $service["postcode"]; 
	$servicephone = $service["phone"]; 
	$serviceweb = $service["web"]; 
	$servicecontact = $service["contact"]; 
	$servicecategoryid = $service["category_id"]; 
?>
<?php 

$query = "SELECT * "; 
$query .= "FROM `category` ORDER BY `name` ASC;"; 
$result = mysqli_query($connection, $query); 
?>
<form action="update.php" method="POST">
<input type="hidden" name="id" id="id" value="<?php echo $serviceid; ?>">
Service name: <input type="text" name="name" id="name" value="<?php echo $servicename; ?>"><br>
<label for="categoryid">Category:</label><select id="categoryid" name="categoryid">
<?php
while ($category = mysqli_fetch_assoc($result)){ 
	$categoryname = $category["name"];
	$categoryid = $category["id"]; 
	if ($servicecategoryid == $categoryid){ 
	$selected = "selected"; 
	} else { 
	$selected = ""; 
	}
	echo "<option value='$categoryid' $selected>$categoryname</option>"; 

}
?>
</select><br>
Address: <input type="text" name="address" id="address" value="<?php echo $serviceaddress; ?>"><br>
City: <input type="text" name="city" id="city" value="<?php echo $servicecity; ?>"><br>
Postcode: <input type="text" name="postcode" id="postcode" value="<?php echo $servicepostcode; ?>"><br>
Phone:  <input type="text" name="phone" id="phone" value="<?php echo $servicephone; ?>"><br>
Web:  <input type="text" name="web" id="web" value="<?php echo $serviceweb; ?>"><br>
Contact:  <input type="text" name="contact" id="contact" value="<?php echo $servicecontact; ?>">
<br>
<input type="submit" value="Submit Changes">
<?php 
}
?>
</form>
<?php
// 4. Release returned data
mysqli_free_result($result); 

?> 
</body>
</html>
<?php
// 5. Close database connection 
mysqli_close($connection); 
}
?>
