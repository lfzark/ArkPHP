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

$('#add_role_modal').modal_j({
	modal_title : '新建扫描',
	modal_content : $('#add_role').html(),
	modal_footer : $('#add_role_footer').html()
});
 
$('#modify_role_modal').modal_j({
	modal_title : '修改角色信息',
	modal_content : $('#modify_role').html(),
	modal_footer : $('#modify_role_footer').html()
});


$("#add_scan_button").click(function() {

	$.post(action_url + '/hostscan/add_scan', {
		nessus_scan_name : $('#nessus_scan_name').val(),
		nessus_scan_target : $('#nessus_scan_target').val(),
		nessus_scan_schedule:$('#nessus_scan_schedule').val(),
		nessus_scan_agent_id:$('#nessus_scan_agent_id').val()
	}, function(data, status) {
			　alert(1);
			 toastr.success('扫描任务已经下发');
		
	});

});