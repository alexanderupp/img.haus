<?php
	spl_autoload_register(function($className) {
		$classFile = APP_PATH . "/" . $className . ".php";
		
		require $classFile;
	});