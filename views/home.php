<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width; initial-scale=1.0"/>
		<meta name="description" content="Seriously simple image hosting with img.haus."/>
		<meta property="og:image" content="https://img.haus/og.png"/>
		<title>img.haus | Seriously simple image hosting</title>
		<link rel="icon" href="/favicon.png"/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/styles.css"/>
		<script src="https://unpkg.com/htmx.org@1.9.6"></script>
	</head>
	<body class="report">
		<div id="progress"><div id="progress-bar"></div></div>
		<div id="app">
			<header class="std-border name">
				<p class="std-pad font-accent">img.haus</p>
			</header>
			<main>
				<?php include VIEW_PATH . "/main.php"; ?>
			</main>
		</div>
		<footer>
			<button class="report-toggle">report image</button>
		</footer>
		<div id="report-container">
			<div class="std-border name">
				<p class="std-pad font-accent">img.haus</p>
			</div>
			<?php include VIEW_PATH . "/report-form.php"; ?>
		</div>
		<script type="text/javascript" src="/js/imghaus.js"></script>
	</body>
</html>