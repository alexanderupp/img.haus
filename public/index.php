<?php
	header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta name="viewport" content="width=device-width; initial-scale=1.0"/>
		<meta name="description" content="Seriously simple image hosting | img.haus"/>
	</head>
	<body>
		<div id="progress-bar"></div>
		<div id="container">
			<div id="upload-container">
				<h1>imghaus</h1>
				<h2 id='tagline-or-whatever'>Seriously simple image hosting</h2>
				<form id='form' hx-encoding='multipart/form-data' hx-post='/upload'>

				</form>
			</div>
		</div>
	</body>
</html>