<?php
	/**
	 * Handles creating result content
	 */
	abstract class Result {
		/**
		 * Form types
		 */
		const UPLOAD = 0;
		const REPORT = 1;

		/**
		 * Creates a result form
		 * 
		 * @param int $_form			Form type
		 * @param string $_string		Result message
		 * @return void
		 */
		protected function result(int $_form = 0, string $_result = "") : void {
			$forms = [
				"upload-form.php",
				"report-form.php"
			];

			$message = null;

			if($_result) {
				$message = $_result;
			}

			header("HX-Trigger-After-Swap: initIMGHaus");

			include VIEW_PATH . "/" . $forms[$_form] ?? $forms[0];
			exit;
		}
	}