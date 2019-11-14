<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = $article->fetch_data($id);

	?>

	<html>
		<head>
			<title>CMS</title>
			<link rel="stylesheet" href="style.css" /> 
		</head>
		<body>
			<div class="container">
				<a href="index.php" id="logo"></a>
			
			<h4><?php echo $data['article_title']; ?> -
				<small>
					posted <?php echo date('d/m/Y', $data['article_time']); ?>
				</small>
			</h4>

			<p><?php echo $data['article_content']; ?></p>

			<a href="index.php">&larr; Back</a>
			</div>
		</body>
	</html>

	<?php
} else {
	header('Location: index.php');
	exit();
}

?>