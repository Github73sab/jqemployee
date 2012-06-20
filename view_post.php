<?php
/* Database konektor */
include("db.inc.php");
$id = $_POST['id'];

$query = "SELECT created,title,body FROM posts WHERE id=$id";
foreach($DB->query($query) as $row) {
	print '<h1 class="page-header">' .$row['title'].'</h1>';
	print '<em>'.$row['created'].'</em><br/>';
	print $row['body'];
}
?>