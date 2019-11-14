<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
	if (isset($_POST['title'], $_POST['content'])) {
		$title = $_POST['title'];
		$content = nl2br($_POST['content']);

		if (empty($title) or empty($content)) {
			$error ='All fields are required!';
		} else {
			$query = $dbh->prepare('INSERT INTO articles (article_title, article_content, article_time) VALUES (?, ?, ?)');

			$query->bindValue(1, $title);
			$query->bindValue(2, $content);
			$query->bindValue(3, time());

			$query->execute();

			header('Location: index.php');
		}
	}

	?>
<html>
	<head>
		<title>Add Article</title>
				 <!-- Required meta tags -->
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		    <!-- Bootstrap CSS -->
		    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
			<link rel="stylesheet" href="../style.css" /> 
			<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	</head>
	<body background="https://images.pexels.com/photos/1166643/pexels-photo-1166643.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
		<div class="container">
			<a href="index.php" id="logo"></a>
		
			<br />

			<h4 id="logo3">Add Article</h4>

			<?php if (isset($error)) { ?>
				<small style="color:#aa0000;"><?php echo $error; ?></small>
				<br /><br />
			<?php } ?>

			<form action="add.php" method="post" autocomplete="off">
				<input type="text" id="title" name="title" placeholder="Title" /><br /><br />
				<textarea rows="15" cols="50" id="blabla" placeholder="Content" name="content"></textarea><br /><br />
				<input type="submit" id="add" value="Add Article" />
			</form>

			<a href="index.php">&larr; Back</a>
			
		</div>

		    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
	</body>
</html>
	<?php
} else {
	header('Location: index.php');
}

?>