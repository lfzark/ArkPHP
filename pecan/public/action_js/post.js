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
//	alert($('.editor-preview').html());
//	alert($('#arkblog_title').val());
//	alert($('#arkblog_tag').val());
//	alert($('#arkblog_category').val());
	//alert(action_url + '/post/addpost');

	$.post(action_url + '/post/addpost', {
		arkblog_title : $('#arkblog_title').val(),
		arkblog_content : $('.editor-preview').html(),
		arkblog_content_md : simplemde.value(),
		arkblog_tag:$('#arkblog_tag').val(),
		arkblog_category:$('#arkblog_category').val(),
	}, function(data, status) {
		  simplemde.togglePreview();
			 alert('发布成功');
		//alert("Data: " + data + "\nStatus: " + status);
	});

});