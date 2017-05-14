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

$('#add_permission_modal').modal_j({
	modal_title : '添加权限',
	modal_content : $('#add_permission').html(),
	modal_footer : $('#add_permission_footer').html()
});

$('#modify_permission_modal').modal_j({
	modal_title : '修改权限信息',
	modal_content : $('#modify_permission').html(),
	modal_footer : $('#modify_permission_footer').html()
});

function modify(id,name,path){
	$('#permission_id').val(id);
	$('#modify_permission_name').val(name);
	$('#modify_permission_path').val(path);
}

function modify_do(){
	
	$.post(action_url+"/user/modify_permission", {
		permission_id:$('#permission_id').val(),
		modify_permission_name:$('#modify_permission_name').val(),
		modify_permission_path:$('#modify_permission_path').val()
	}, function(data, status) {
		 toastr.success('修改成功');
		 location.reload();
		 
	});
	

}
function add_do(){
	
	$.post(action_url+"/user/add_permission", {
		add_permission_name:$('#add_permission_name').val(),
		add_permission_path:$('#add_permission_path').val()
	}, function(data, status) {

		 toastr.success('添加成功');
		 location.reload();
		 
	});
	

}

$('#add_permission_button').click(function(){
	
	toastr.success('用户添加成功');
	
});