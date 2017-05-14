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

$('#add_webscan_modal').modal_j({
	modal_title : 'web扫描',
	modal_content : $('#webscan_scan').html(),
	modal_footer : $('#webscan_scan_footer').html()
});
 
//$('#modify_role_modal').modal_j({
//	modal_title : '修改角色信息',
//	modal_content : $('#modify_role').html(),
//	modal_footer : $('#modify_role_footer').html()
//});
