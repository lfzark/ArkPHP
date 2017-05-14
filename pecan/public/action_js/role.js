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
	modal_title : '添加角色',
	modal_content : $('#add_role').html(),
	modal_footer : $('#add_role_footer').html()
});
 
$('#modify_role_modal').modal_j({
	modal_title :  '修改角色信息',
	modal_content : $('#modify_role').html(),
	modal_footer : $('#modify_role_footer').html()
});

function role_add(){

		$.post(action_url+"/user/addrole", {
			role_name:$('#role_name').val(),
			role_permission_list:$('#role_permission_list').val()
		}, function(data, status) {

			 toastr.success('角色添加成功');
			 location.reload();
			 
		});

}

function modify_role(role_id,role_name,permission_list){
	
	$('#modify_role_id').val(role_id);
  $('#modify_role_name').val(role_name);
	$('#modify_role_permission_list').val(permission_list);
}

function role_modify_do(){
	
	$.post(action_url+"/user/modifyrole", {
		role_id:$('#modify_role_id').val(),
		role_name:$('#modify_role_name').val(),
		role_permission_list:$('#modify_role_permission_list').val()
	}, function(data, status) {

		 toastr.success('角色修改成功');
		 location.reload();
	});

}
function role_del(roleid){

	$.post(action_url+"/user/delrole", {
		role_id:roleid
	}, function(data, status) {
		 toastr.success('角色DEL成功');
		 location.reload();
		 
	});

}

