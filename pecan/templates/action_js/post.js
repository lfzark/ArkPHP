var simplemde = new SimpleMDE({
	element : document.getElementById("editor"),

	lineWrapping : true,
	renderingConfig : {
		singleLineBreaks : false,
		codeSyntaxHighlighting : true,
	}
});
$('.selectpicker').selectpicker();

$("#pubpost").click(function() {
	simplemde.togglePreview();
	alert($('.editor-preview').html());
	alert($('#arkblog_title').val());
	alert($('#arkblog_tag').val());
	alert($('#arkblog_category').val());
	$.post("<!--{ACTION_URL}-->", {

	}, function(data, status) {
		alert("Data: " + data + "\nStatus: " + status);
	});

});