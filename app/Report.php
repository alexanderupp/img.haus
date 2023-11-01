<?php
	/**
	 * Reporting functionality
	 */
	class Report {
		public function __construct() {}

		public function error() : void {
			$this->result("There was amn error processing your request.");
		}

		public function logRequest(string $url) : bool {
			
		}

		public function success() : void {
			$this->result("Your report has been saved.");
		}

		private function result(string $_string = "") : void {
			$message = null;

			if($_result) {
				$message = $_result;
			}

			header("HX-Trigger-After-Swap: initIMGHaus");

			include VIEW_PATH . "/report-form.php";
			exit;
		}
	}