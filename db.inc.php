<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'apptest';

try {
	$DB = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
} catch(PDOException $e) {
		echo $e->getMessage();
}

?>