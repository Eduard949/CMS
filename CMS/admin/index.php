<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
?>

<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order 
$result = $dbh->query("SELECT * FROM articles ORDER BY id DESC");
?>

<html>
<head>	
	<title>Admin Panel</title>
	<link rel="stylesheet" href="../style.css" /> 

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body background="https://i.ibb.co/PMNqnQr/55627774-415856232514701-2845586262197272576-n.jpg">

<button type="button" class="btn btn-info"><a href="add.php">Add</a></button>
	<br/><br/>

<button type="button" class="btn btn-secondary"><a href="logout.php">Logout</a></button>
	<table align="center" width='80%' border=0>

	<tr bgcolor='#CCCCCC'>

		<th>&nbsp</th>
	</tr>
		
		
	</tr>
	<?php 	
		while($row = $result->fetch(PDO::FETCH_ASSOC)) { 	
		echo "<tr>";
		echo "<th><i>".$row['article_title']."</i></th>";
		echo "</tr>";
		echo "<td>".$row['article_content']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[id]\"><img src=\"https://i.ibb.co/4MV4RSY/54799697-2450770734982735-1411743616912588800-n.png\"></a>  <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this article?')\"><img src=\"https://i.ibb.co/c6682S9/55446937-383279875732557-9219757263529443328-n.png\"></a></td>";
		echo "<th><a>ID:</a>".$row['id']."</th>";	
			
	}
	?>

	</table>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

	<?php
}else {
	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if (empty($username) or empty ($password)){
			$error = 'All fields are required!';
		} else{
			$query = $dbh->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

			$query->bindValue(1, $username);
			$query->bindValue(2, $password);

			$query->execute();

			$num = $query->rowCount();

			if ($num ==1) {
				//user entered correct details
				$_SESSION['logged_in'] = true;

				header('Location: index.php');
				exit();
			} else {
				//user entered false details
				$error = 'Incorrect details!';
			}
		}
	}

	?>

<html>
	<head>
		<title>CMS</title>
		<link rel="stylesheet" href="../style.css" /> 
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	</head>
	<body background="https://images.pexels.com/photos/167684/pexels-photo-167684.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
		<div class="container">
			<a href="index.php" id="logo">Login to Admin Panel</a>

			<br /><br />

			<?php if (isset($error)) { ?>
				<small style="color:#aa0000;"><?php echo $error; ?></small>
				<br /><br />
			<?php } ?>

			<form action="index.php" method="post" autocomplete="off">
				<input type="text" id="username" name="username" placeholder="Username" />
				<input type="password" id="password" name="password" placeholder="Password" />
				<input type="submit" value="Login" />
			</form>
		</div>
	</body>
</html>

	<?php
}

?>


<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbh->query("SELECT * FROM articles ORDER BY id DESC");
	?>


