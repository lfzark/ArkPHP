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

$('#dist_plugin_modal').modal_j({
	modal_title : '插件下发',
	modal_content : $('#dist_plugin').html(),
	modal_footer : $('#dist_plugin_footer').html()
});
 
$('#modify_role_modal').modal_j({
	modal_title : '修改角色信息',
	modal_content : $('#modify_role').html(),
	modal_footer : $('#modify_role_footer').html()
});
