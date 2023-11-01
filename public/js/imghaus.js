(() => {
	htmx.on("#uploadform", "htmx:beforeRequest", e => {
		if(htmx.find("#file_input").value == "") {
			htmx.trigger(e.detail.elt, "htmx:abort");
		}

		htmx.find("#upload").setAttribute("disabled", true);
		htmx.find("#progress").style.display = "block";
		htmx.find("#upload-result").innerHTML = "<p>uploading...</p>";
	});
	htmx.on("#uploadform", "htmx:afterSettle", e => {
		htmx.find("#progress").style.display = "none";
		htmx.find("#progress").style.width = "0%";

		document.body.classList.toggle("alternate");

		const result = document.querySelector("#upload-result .result");

		if(result) {
			result.addEventListener("focus", e => {
				result.select();
				result.setSelectionRange(0, 99999);

				navigator.clipboard.writeText(result.value);
				console.log(result.value);
			});
		}
	});
	htmx.on("#uploadform", "htmx:xhr:progress", evt => {
		htmx.find("#progress").style.width = (evt.detail.loaded/evt.detail.total * 100) + "%";
	});

	htmx.on("#reportform", "htmx:beforeRequest", e => {
		const url = htmx.find("#report_url");

		if(url.value.length < 23) {
			htmx.trigger(e.detail.elt, "htmx:abort");
			htmx.find("#report-result").innerHTML = "<p>Please enter a valid url.</p>";

			e.preventDefault();
			return false;
		}

		htmx.find("#submit-report").setAttribute("disabled", true);
		htmx.find("#report-result").innerHTML = "<p>sending...</p>";
	});

	document.querySelectorAll(".report-toggle").forEach(repToggle => {
		repToggle.addEventListener("click", e => {
			e.preventDefault();

			document.getElementById("action-form").classList.toggle("alternate");

			window.scrollTo({top:0, behavior:"smooth"});
		});
	});


	document.body.addEventListener("initIMGHaus", e => {
		document.getElementById("file_input").addEventListener("change", function(e) {
			const file = this.files[0];
	
			if(file.size > 5242880) {
				htmx.find("#upload-result").innerHTML = "<p>Your image exceeds the file size limit</p>";
				htmx.find("#upload").setAttribute("disabled", true);
			} else {
				htmx.find("#upload").removeAttribute("disabled");
				htmx.find("#upload-result").innerHTML = "<p></p>";
				htmx.find("#file_text").innerHTML = file.name;
			}
		});
	});

	htmx.trigger(document.body, "initIMGHaus");
})();