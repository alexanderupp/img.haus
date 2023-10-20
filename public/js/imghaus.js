(() => {
	htmx.on("#uploadform", "htmx:beforeRequest", e => {
		if(htmx.find("#file_input").value == "") {
			htmx.trigger(e.detail.elt, "htmx:abort");
		}
	});
	htmx.on("#uploadform", "htmx:afterRequest", e => {
		htmx.find("#upload-result").classList.add("complete");
	});
	htmx.on("#uploadform", "htmx:xhr:progress", evt => {
		htmx.find("#progress").style.width = (evt.detail.loaded/evt.detail.total * 100) + "%";
	});
})();