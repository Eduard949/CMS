<?php
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();


?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="style.css" /> 
		<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	</head>

	<body id="text" background="https://www.muralswallpaper.com/app/uploads/soft-blue-marble-textures-plain.jpg">
		<div class="container">
			<center><p><b><i><a href="index.php" id="Welcome">Welcome!</a></p></b></i></center>

			<ol>
				<?php foreach($articles as $article) { ?>
				<li>
					<p><b <?php echo $article['id'];?>>
						<?php echo $article['article_title']; ?>

					<small>
						<small id="id-post">ID:<?php echo $article['id']; ?></small>
					</small>

					</p></b>
					<a>
						<?php echo $article['article_content']; ?>
					</a>
				</li>

					<small id="posted">
					posted <?php echo date('d/m/Y', $article['article_time']); ?>
				    </small>
				
			  	<?php } ?>
			</ol>

			<br />
			<div class="main">
    			<div class="sub-main">
			<small>
				<a href="admin" class="action-button shadow animate red">Admin Panel</button></a>
			</small>

			<div>
				<a style="display:scroll;position:fixed;bottom:-7px;right:15px;" title=""><img src="https://i.ibb.co/cQ8JQzY/55957756-300771890863802-9199308198383714304-n.png" width="195" height="84" usemap="#arrows" scale="0"></a>
		    </div>

		    <div>
		    	<a style="display:scroll;position:fixed;bottom:-5px;left:15px;" title=""><img src="https://i.ibb.co/0fFx1mv/55536503-359619957979980-2083995733488304128-n.png" scale="0"></a>
		    </div>

		<div>
			<map name="arrows">
			   <area shape="rect" coords="30,3,83,77" href="#footer">
			   <area shape="rect" coords="107,3,160,77" href="#">
			</map>
		</div>
            </div>
  				</div>
					</div>
			<div id="footer" role="contentinfo">
			</div>

			<style>
.snowflake {
	color: #fff;
	font-size: 1em;
	font-family: Arial, sans-serif;
	text-shadow: 0 0 5px #000;
}

	@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%,100%{-webkit-transform:translateX(0);
	transform:translateX(0)}50%{-webkit-transform:translateX(80px);
	transform:translateX(80px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%,100%{transform:translateX(0)}50%{transform:translateX(80px)}}.snowflake{position:fixed;
	top:-10%;
	z-index:9999;
	-webkit-user-select:none;
	-moz-user-select:none;
	-ms-user-select:none;
	user-select:none;
	cursor:default;
	-webkit-animation-name:snowflakes-fall,snowflakes-shake;
	-webkit-animation-duration:10s,3s;
	-webkit-animation-timing-function:linear,ease-in-out;
	-webkit-animation-iteration-count:infinite,infinite;
	-webkit-animation-play-state:running,running;
	animation-name:snowflakes-fall,snowflakes-shake;
	animation-duration:10s,3s;
	animation-timing-function:linear,ease-in-out;
	animation-iteration-count:infinite,infinite;
	animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;
	-webkit-animation-delay:0s,0s;
	animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;
	-webkit-animation-delay:1s,1s;
	animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;
	-webkit-animation-delay:6s,.5s;
	animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;
	-webkit-animation-delay:4s,2s;
	animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;
	-webkit-animation-delay:2s,2s;
	animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;
	-webkit-animation-delay:8s,3s;
	animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;
	-webkit-animation-delay:6s,2s;
	animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;
	-webkit-animation-delay:2.5s,1s;
	animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;
	-webkit-animation-delay:1s,0s;
	animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;
	-webkit-animation-delay:3s,1.5s;
	animation-delay:3s,1.5s}.snowflake:nth-of-type(10){left:25%;
	-webkit-animation-delay:2s,0s;
	animation-delay:2s,0s}.snowflake:nth-of-type(11){left:65%;
	-webkit-animation-delay:4s,2.5s;
	animation-delay:4s,2.5s}
			</style>
			
<div class="snowflakes" aria-hidden="true">
	<div class="snowflake">
	❅
	</div>
	<div class="snowflake">
	❆
	</div>
	<div class="snowflake">
	❅
	</div>
	<div class="snowflake">
	❆
	</div>
	<div class="snowflake">
	❅
	</div>
	<div class="snowflake">
	❆
	</div>
	<div class="snowflake">
	❅
	</div>
	<div class="snowflake">
	❆
	</div>
	<div class="snowflake">
	❅
	</div>
	<div class="snowflake">
	❆
	</div>
	<div class="snowflake">
	❅
	</div>
	<div class="snowflake">
	❆
	</div>
</div>
	</body>
</html>
