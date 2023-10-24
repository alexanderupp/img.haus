<?php
	header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta name="viewport" content="width=device-width; initial-scale=1.0"/>
		<meta name="description" content="Seriously simple image hosting with img.haus."/>
		<title>img.haus | Seriously simple image hosting</title>
		<link rel="icon" href="/favicon.png"/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/styles.css"/>
		<script src="https://unpkg.com/htmx.org@1.9.6"></script>
	</head>
	<body>
		<div id="progress"><div id="progress-bar"></div></div>
		<div id="app">
			<header class="std-border">
				<p class="std-pad font-accent">img.haus</p>
			</header>
			<main>
				<section id="main">
					<h1>Seriously simple image hosting</h1>
					<?php include VIEW_PATH . "/form.php"; ?>
				</section>
				<section id="terms">
					<p class="dbl-pad font-accent">
						terms
					</p>
					<ul id="terms-list">
						<li>DO upload images you have permission to use. This means images you have created or been given permission by the original creator.</li>
						<li>DO NOT use us to host your website media content. Reddit/forum posts are allowed.</li>
						<li>DO NOT upload gore, or material that is threatening, harassing, defamatory, or that encourages violence or crime, or in any way could be considered hate speech.</li>
						<li>DO NOT upload illegal content such as child porn or nonconsensual/revenge porn.</li>
					</ul>
				</section>
			</main>
			<!--  -->
		</div>
		<footer>
			<a href="javascript:void(0)">report image</a>
		</footer>
		<script type="text/javascript" src="/js/imghaus.js"></script>
	</body>
</html>