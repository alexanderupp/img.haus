<form id="uploadform" hx-encoding="multipart/form-data" hx-post="/upload/" hx-swap="innerHTML">
	<h2 class="dbl-pad font-accent">
		upload
	</h2>
	<p>Images must be 5MB or smaller.</p>
	<div id="file">
		<p id="file_text">
			<span>Click to select an image</span> <img src="/arrow.svg" alt="-->"/>
		</p>
		<input type="file" id="file_input" name="image" accept=".jpeg,.jpg,.png" required placeholder="Click to select an image"/>
	</div>
	<button type="submit" id="upload">Upload</button>
	<div id="upload-result" class="complete"><?php echo $message ?? ""; ?> </div>
</form>