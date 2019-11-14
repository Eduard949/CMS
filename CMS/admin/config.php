<?php

try {
	
	 $dbh = new PDO('mysql:host=db;dbname=',"root","");
	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	
} catch(PDOException $e) {
	echo $e->getMessage();
}
 
?>
