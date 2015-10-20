<?php 
$pagetitle = "Waratah Hills Drop-in Centre Services"; 
$description = ""; 
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
<?php 
if (isset($_GET['category'])){
	$query = "SELECT * "; 
	$query .= "FROM `category` WHERE `id`='";
	$query .= mysqli_real_escape_string($connection,$_GET['category']);
	$query .= "' ORDER BY `name` ASC LIMIT 1;"; 
	$result = mysqli_query($connection, $query); 
	// Test if there was a query error 
	if (!$result){ 
		die("Database query failed."); 
	}
	// 3. Use returned data (if any) 
	while ($category = mysqli_fetch_assoc($result)){
		$pagetitle = $category['name'];
		$description = $category['description']; 
}

}
?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $pagetitle; ?></title>
</head>
<body>
<h1><?php echo $pagetitle; ?></h1>
<p><?php echo $description; ?></p>
<?php 
if (isset($_GET['category'])){

$query = "SELECT * "; 
$query .= "FROM `service` WHERE `category_id`='";
$query .= mysqli_real_escape_string($connection,$_GET['category']);
$query .= "' ORDER BY `name` ASC;"; 
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
?>
<div><a href="<?php echo $serviceweb; ?>"><span class="servicename"><?php echo $servicename; ?></span></a></div>
<div><?php echo $serviceaddress; ?><br>
<?php echo $servicecity; echo " "; echo $servicepostcode; ?> 
</div>
<div>Contact person: <?php echo $servicecontact; ?></div>
<div>Phone: <?php echo $servicephone; ?></div><div><br><br></div>
<?php 
}
}
?> 
<h2>Other categories</h2>
<?php 
	$query = "SELECT * "; 
	$query .= "FROM `category` ;";
	$result = mysqli_query($connection, $query); 
	// Test if there was a query error 
	if (!$result){ 
		die("Database query failed."); 
	}
	// 3. Use returned data (if any) 
	while ($category = mysqli_fetch_assoc($result)){
		$categoryname = $category['name'];
		$categoryid = $category['id']; 
		?>
        <li><a href="index.php?category=<?php echo $categoryid; ?>"><?php echo $categoryname; ?></a></li>
<?php 
}
?> 
</body>
</html>
