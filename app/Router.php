<?php
	/**
	 * Basic URL router
	 */
	class Router {
		protected array $routes = [];

		public function __construct() {}

		/**
		 * Adds a route to the routes array
		 * 
		 * @param string $_method		Request method
		 * @param string $_url			Request url
		 * @param closure $_action
		 * @return void
		 */
		public function addRoute(string $_method, string $_url, closure $_action) : void {
			$this->routes[$_method][$_url] = $_action;
		}

		/**
		 * Attempts to match a route
		 * 
		 * @param string $_method		Request method
		 * @param string $_url			Request url
		 * @return bool
		 */
		public function match(string $_method, string $_url) : bool {
			if(empty($this->routes[$_method])) {
				throw new Exception("Method not found");
			}

			foreach($this->routes[$_method] as $url => $action) {
				if(preg_match('#^' . $url . '$#', $_url, $matches)) {
					$args = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
				
					call_user_func_array($action, $args);
					return true;
				}
			}

			throw new Exception("Route not found");
			return false;
		}
	}