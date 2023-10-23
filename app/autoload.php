<?php
	spl_autoload_register(function($className) {
		//$classFile =  str_replace('\\', DIRECTORY_SEPARATOR, \SocialNetwork\Constants\BASE_PATH . "\\" . $className) . ".php";

		$classFile = APP_PATH . "/" . $className . ".php";
		
		require $classFile;
	});