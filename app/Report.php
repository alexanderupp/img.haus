<?php
	/**
	 * Reporting functionality
	 */
	class Report extends Result {
		public function __construct() {}

		public function error() : void {
			$this->result(
				self::UPLOAD,
				"<p>There was amn error processing your request.</p>"
			);
		}

		public function logRequest(string $url) : bool {
			$this->result(
				self::REPORT,
				"<p>This is a result.</p>"
			);
		}

		public function success() : void {
			$this->result(
				self::REPORT,
				"<p>Your report has been saved.</p>"
			);
		}
	}