<?php
try {

$dbh = new PDO('mysql:host=db;dbname=',"root","");

} catch (PDOException $e) {
	exit('Database error.');
}

?>