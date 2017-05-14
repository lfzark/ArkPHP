var simplemde = new SimpleMDE({
	element : document.getElementById("editor"),

	lineWrapping : true,
	renderingConfig : {
		singleLineBreaks : false,
		codeSyntaxHighlighting : true,
	}
});

$('.selectpicker').selectpicker();

$("#savedraft").click(function() {
		save_post(1);
});

$("#pubpost").click(function() {
		save_post();
});

function save_post(draft_tag=0){
	 simplemde.togglePreview();

	 var md_content_rendered = $('.editor-preview').html();
	 var md_content = simplemde.value();
	 var md_abstract = (md_content.split("\n").slice(0,10)).join('\n');

	 var re = new RegExp("```","g");
	 var arr = md_abstract.match(re);
	 //单次的时候被阻断，加上闭合
	 if (arr!==null && arr.length%2==1){
	 md_abstract = md_abstract + "\n```";
	 }
	 simplemde.value(md_abstract);
	 simplemde.togglePreview();
	 md_abstract = $('.editor-preview').html();

	$.post(action_url + '/post/addpost', {
		arkblog_title : $('#arkblog_title').val(),
		arkblog_refer : $('#arkblog_refer').val(),
		arkblog_content : md_content_rendered,
		arkblog_content_md : md_content,
		arkblog_abstract :md_abstract,
		arkblog_tag:$('#arkblog_tag').val(),
		arkblog_draft_tag:draft_tag,
		arkblog_category:$('#arkblog_category').val()
	}, function(data, status) {
		   simplemde.togglePreview();
			 toastr.success('发布成功');
		//alert("Data: " + data + "\nStatus: " + status);
	});
	
	
	
}
