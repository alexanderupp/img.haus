<form id="reportform" hx-encoding="text/plain" hx-post="/report/">
	<p class="std-pad font-accent">report</p>
	<div class="std-pd">&nbsp;</div>
	<p class="dbl-pad">Did you find an image uploaded to IMG.HAUS that breaks our Terms?</p>
	<div id="report-result" class="<?php if($message ?? false) { echo "dbl-pad complete"; } ?> bold"><?php echo $message ?? ""; ?></div>
	<p class="std-pad">Image URL:</p>
	<div class="dbl-pad">
		<input type="text" class="textdata" name="report_url" placeholder="https://img.haus/xxxxxxx" required pattern="http?:\/\/img\.local\/[\w\-_]{7,9}" title="Image URL"/>
	</div>
	<p class="std-pad std-line">Reason for reporting:</p>
	<div class="std-pad">
	<?php
		$options = [
			"copyright" => "Copyright violation",
			"threats" => "Threatening/Harassing/Defamatory",
			"hate" => "Hate Speech",
			"nonconsenual" => "Nonconsenual/Revenge/Underage Porn",
			"other" => "Other"
		];
		$index = 0;

		foreach($options as $id => $option) {
	?>
		<div class="report-option std-pad">
			<label for="<?php echo $id; ?>" title="<?php echo $option; ?>">
				<input type="checkbox" class="report-reason" name="report_reason[<?php echo $index++; ?>]" value="<?php echo $id; ?>" id="<?php echo $id; ?>"/> <?php echo $option; ?>
			</label>
		</div>
	<?php
		}
	?>
	</div>
	<div id="report-buttons">
		<button type="submit" id="submit-report">Submit</button>
		<button type="button" class="report-toggle">cancel</button>
	</div>
</form>