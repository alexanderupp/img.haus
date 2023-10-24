<?php
	/**
	 * Image rendering and validating
	 */
	class Image {
		private string $key;

		// valid image types
		private array $types = [
			"jpg" => "image/jpeg",
			"png" => "image/png"
		];

		/**
		 * @param string $_key		Image key
		 */
		public function __construct(string $_key) {
			$this->key = $_key;
		}

		/**
		 * Outputs the selected image to the browser
		 * 
		 * @param string $_type		Image type
		 * @return void
		 */
		public function render(string $_type) : void {
			header("Content-Type: " . $this->types[$_type]);

			echo file_get_contents(UPLOAD_PATH . "/" . $this->key . "." . $_type);
			exit;
		}

		/**
		 * Checks if the image key is a valid uploaded image
		 * 
		 * @return mixed		File extension if found; false otherwise
		 */
		public function validate() : mixed {
			if(file_exists(UPLOAD_PATH . "/" . $this->key . ".png")) {
				return "png";
			} else if(file_exists(UPLOAD_PATH . "/" . $this->key . ".jpg")) {
				return "jpg";
			}

			return false;
		}

		public function setKey(string $_key) : void {
			$this->key = $_key;
		}
	}