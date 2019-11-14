<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (isset($_SESSION['logged_in'])) {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];


		$query = $dbh->prepare('DELETE FROM articles WHERE id = ?');
		$query->bindValue(1, $id);
		$query->execute();

		header('Location: index.php');
	}

	$articles = $article->fetch_all();

	?>


	<?php
} else {
	header('Location: index.php');
}

?>