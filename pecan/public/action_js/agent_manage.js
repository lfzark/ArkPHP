$(function() {

	$('#example1').DataTable({
		"paging" : true,
		"lengthChange" : false,
		"searching" : false,
		"ordering" : true,
		"info" : true,
		"autoWidth" : false
	});

});

$('#add_agent_modal').modal_j({
	modal_title : '注册Agent',
	modal_content : $('#add_agent').html(),
	modal_footer : $('#add_agent_footer').html()
});

$('#dist_agent_modal').modal_j({
	modal_title : '下发插件',
	modal_content : $('#dist_agent').html(),
	modal_footer : $('#dist_agent_footer').html()
});

//$('#add_user_button').click(function(){
//	
//	toastr.success('用户添加成功');
//	
//	$('#add_user').remove();
//});