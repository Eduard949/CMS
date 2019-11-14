<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$article_title=$_POST['article_title'];
	$article_content=$_POST['article_content'];
	$article_time=$_POST['article_time'];	
	
	// checking empty fields
	if(empty($article_title) || empty($article_content) || empty($article_time)) {	
			
		if(empty($article_title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($article_content)) {
			echo "<font color='red'>Content field is empty.</font><br/>";
		}
		
		if(empty($article_time)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$sql = "UPDATE articles SET article_title=:article_title, article_content=:article_content, article_time=:article_time WHERE id=:id";
		$query = $dbh->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':article_title', $article_title);
		$query->bindparam(':article_content', $article_content);
		$query->bindparam(':article_time', $article_time);
		$query->execute();
		
		
				
		//redirectig to the display page. 
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM articles WHERE id=:id";
$query = $dbh->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$article_title = $row['article_title'];
	$article_content = $row['article_content'];
	$article_time = $row['article_time'];
}
?>
<html>
<head>	
	<title>Edit Article</title>
		    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="../style.css" /> 
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
</head>

<body background="https://i.ibb.co/64PMvMy/55759929-2382691005097627-1751154743213817856-n.jpg">
<div class="container">
	<a href="index.php" id="logo">Edit Data</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table align="center" border="0">

			<tr> 
				<td id="edit-title">Title</td>
				<td><input type="text" id="edit_title" name="article_title" value="<?php echo $article_title;?>"></td>
			</tr>

			<tr> 
				<td id="edit-content">Content</td>
				<td><input type="text" id="edit_content" name="article_content" value="<?php echo $article_content;?>"></td>
			</tr>

			<tr> 
				<td></td>
				<td><input type="hidden" name="article_time" value="<?php echo $article_time;?>"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
			</tr>

			<tr>
				<td><input type="submit" id="edit" name="update" value="Update"></td>
			</tr>

		</table>
	</form>
	<a href="index.php">&larr;Back</a>
</div>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
