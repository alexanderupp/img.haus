<?php
	class Uploader {
		private array $types = [
			"jpg" => "image/jpeg",
			"jpeg" => "image/jpeg",
			"png" => "image/png"
		];
		private $maxSize = 5242880;

		public function __construct() { }

		/**
		 * Handles the image upload
		 * 
		 * @return void
		 */
		public function upload() : void {
			// check for any errors
			if(($_FILES["image"]["error"] == UPLOAD_ERR_INI_SIZE) || ($_FILES["image"]["size"] > $this->maxSize)) {
				$this->result(
					"<p>Your image exceeds the 5MB upload size.</p>"
				);
			}

			if($_FILES["image"]["error"] == UPLOAD_ERR_NO_FILE) {
				$this->result(
					"<p>The image was only partially uploaded. Please try again.</p>"
				);
			}

			$pathData = explode(".", strtolower($_FILES["image"]["name"]));
			$ext = end($pathData);
			$type = $_FILES["image"]["type"];

			// check for a valid file type
			if(empty($this->types[$ext])) {
				//just in case
				unlink($_FILES["image"]["tmp_name"]);

				$this->result(
					"<p>Invalid file type.</p>"
				);
			}

			// extension doesn't match the MIME type, could be Sketchtown
			if($this->types[$ext] != $type) {
				//just in case
				unlink($_FILES["image"]["tmp_name"]);

				$this->result(
					"<p>Invalid file type.</p>"
				);
			}
			
			$upload = $this->saveUpload($type);

			if(!$upload) {
				$this->result(
					"<p>There was an error saving the image. Please try again<p>"
				);
			} else {
				$this->result(
					"<input type='text' class='result' value='https://img.haus/" . $upload . "'/>"
					);
			}
		}

		/**
		 * Creates the upload response
		 * 
		 * @return void
		 */
		private function result(string $_result = "") : void {
			$message = null;

			if($_result) {
				$message = $_result;
			}

			header("HX-Trigger-After-Swap: initIMGHaus");

			include VIEW_PATH . "/form.php";
			exit;
		}

		/**
		 * Actually save the uploaded file
		 * 
		 * @param string $_type		Image MIME type
		 * @return mixed			false if failed; image hash key if saved
		 */
		private function saveUpload(string $_type) : mixed {
			$key = "";
			$saved = false;

			switch($_type) {
				case "image/jpeg":
					$key = $this->hashKey(".jpg");
					$saved = $this->saveJPEG($key);

					break;
				case "image/png":
					$key = $this->hashKey(".png");
					$saved = $this->savePNG($key);

					break;
				default:
					return false;
					break;
			}

			return $saved ? $key : false;
		}

		/**
		 * Save the JPEG image
		 * 
		 * @param string $_key		Hash key
		 * @return bool
		 */
		private function saveJPEG(string $_key) : bool {
			$ext = ".jpg";
			$image = imagecreatefromjpeg($_FILES["image"]["tmp_name"]);

			$width = imagesx($image);
			$height = imagesy($image);

			// compress a tiny bit
			$quality = floor(100 - (($width * $height) * 3) / $_FILES["image"]["size"]) - 2;

			$saved = imagejpeg($image, UPLOAD_PATH . "/" . $_key . ".jpg", $quality);

			imagedestroy($image);

			return $saved;
		}

		/**
		 * Save the PNG image
		 * 
		 * @param string $_key		Hash key
		 * @return bool
		 */
		private function savePNG(string $_key) : bool {
			$image = imagecreatefrompng($_FILES["image"]["tmp_name"]);
					$ext = ".png";
			$saved = imagepng($image, UPLOAD_PATH . "/" . $_key . ".png", 9);

			imagedestroy($image);

			return $saved;
		}

		/**
		 * Creates a hash key for the image
		 * 
		 * @param string $ext		File extension
		 * @return string
		 */
		private function hashKey(string $ext): string {
			$key = hash("crc32b",
				$_SERVER["REMOTE_ADDR"] . 
				hash_file("sha256", $_FILES["image"]["tmp_name"]) . 
				$_FILES["image"]["name"] .
				hrtime(true)
			);

			// check for potential collision
			if(file_exists(UPLOAD_PATH . "/". $key . $ext)) {
				$key = $this->hashKey($ext);
			}

			return $key;
		}
	}