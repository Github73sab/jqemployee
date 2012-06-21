<?php

	include ("db.inc.php");

	// CLIENT INFORMATION
	$eid        = htmlspecialchars(trim($_POST['eid']));
	$fullname        = htmlspecialchars(trim($_POST['fullname']));
	$email        = htmlspecialchars(trim($_POST['email']));	
	$address       = htmlspecialchars(trim($_POST['address']));
	$postcode        = htmlspecialchars(trim($_POST['postcode']));
	$phone        = htmlspecialchars(trim($_POST['phone']));


	$employee_data = array(
						'eid' => $eid,
						'fullname' => $fullname,
						'email' => $email,
						'address' => $address,
						'postcode' => $postcode,
						'phone' => $phone
					)
	  
	$STH = $DB->("INSERT INTO employee (employee_id, fullname, email, address, postcode, phone) VALUES (:eid, :fullname, :email, :address, :postcode, :phone)");
					   
	$STH->execute($employee_data);  
?>
