<?php

	include ("db.inc.php");

	// CLIENT INFORMATION
	$eid		= htmlspecialchars(trim($_POST['employee-id']));
	$fullname	= htmlspecialchars(trim($_POST['fullname']));
	$email		= htmlspecialchars(trim($_POST['email']));	
	$address	= htmlspecialchars(trim($_POST['address']));
	$postcode	= htmlspecialchars(trim($_POST['postcode']));
	$phone		= htmlspecialchars(trim($_POST['phone']));

	$STH = $DB->prepare("INSERT INTO employee (employee_id, fullname, email, address, postcode, phone) VALUES ($eid, $fullname, $email, $address, $postcode, $phone)");
	$STH->execute();
	
	$DB = null;				   
	  
?>
