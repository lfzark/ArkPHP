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

$('#add_pocscan_manage_modal').modal_j({
	modal_title : 'PoC添加',
	modal_content : $('#add_pocscan_manage').html(),
	modal_footer : $('#add_pocscan_manage_footer').html()
});
 
 