<?php
	define("APP_PATH", realpath(__DIR__ . "/../app"));
	define("VIEW_PATH", realpath(__DIR__ . "/../views"));
	define("UPLOAD_PATH", realpath(__DIR__ . "/../images"));

	include APP_PATH . "/autoload.php";

	$Router = new Router();

	// add home page
	$Router->addRoute("GET", "/", function() {		
		include VIEW_PATH . "/home.php";
		exit;
	});

	// add upload handler
	$Router->addRoute("POST", "/upload/?", function() {
		$Uploader = new Uploader();

		$Uploader->upload();
	});
	
	// add image urls
	$Router->addRoute("GET", "/(?P<key>[a-zA-Z0-9]{6,9})/?", function(string $key) {
			echo "image: " . $key; exit;
	});

	// attempt to match a route
	try {
		$Router->match($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
	} catch(Exception $e) {
		// any routing error takes us home
		http_response_code(404);

		include VIEW_PATH . "/home.php";
		exit;
	}

	exit;