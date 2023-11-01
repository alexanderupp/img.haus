<form id="reportform" hx-encoding="text/plain" hx-post="/report/">
	<p class="std-pad font-accent">report</p>
	<div class="std-pd">&nbsp;</div>
	<p class="std-pad">Did you find an image uploaded to IMG.HAUS that breaks our Terms? Enter the image URL below and we'll review your request.</p>
	<div class="std-pad">
		<input type="text" class="textdata" id="report_url" placeholder="https://img.haus/xxxxxxx" required pattern="https://img.local/[a-zA-Z0-9]{7,9}"/>
	</div>
	<div class="std-pad">
		<select>
			<option>Copyright violation</option>
			<option>Threatening/Harassing/Defamatory</option>
			<option>Hate Speech</option>
			<option>Nonconsenual/Revenge/Underage Porn</option>
			<option>Other</option>
		</select>
	</div>
	<div id="report-buttons">
		<button type="submit" id="submit-report">Submit</button>
		<button class="report-toggle">cancel</button>
	</div>
	<div id="report-result" class="complete"><?php echo $message ?? ""; ?> </div>
</form>