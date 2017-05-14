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

$('#add_user_modal').modal_j({
	modal_title : '添加用户',
	modal_content : $('#add_user').html(),
	modal_footer : $('#add_user_footer').html()
});

$('#modify_user_modal').modal_j({
	modal_title : '修改用户信息',
	modal_content : $('#modify_user').html(),
	modal_footer : $('#modify_user_footer').html()
});

$('#add_user_button').click(function(){
	
	toastr.success('用户添加成功');
	
	$('#add_user').remove();
});

function auth_user(user_id){

	$.post(action_url + '/user/auth', {
		user_id : user_id
	}, function(data, status) {
		      
			 toastr.success('授权成功');
			 location.reload();

	});
	
}

function add_user(){


	$.post(action_url + '/user/add_user', {
		username : $('#add_user_username').val(),
		nickname : $('#add_user_nickname').val(),
		password : $('#add_user_password').val(),
		role_id : $('#add_user_role').val()
		
	}, function(data, status) {

			 toastr.success('用户添加成功');
			 location.reload();

	});
	
}


function modify_user(){

	$.post(action_url + '/user/modify_user', {
		user_id : $('#modify_user_user_id').val(),
		nickname : $('#modify_user_nickname').val(),
		password : $('#modify_user_password').val(),
		role_id : $('#modify_user_role_id').val()
		
	}, function(data, status) {
		      
			 toastr.success('用户修改成功');
			 location.reload();

	});
	
}
function del_user(user_id){


	$.post(action_url + '/user/del_user', {
		user_id : $('#del_user_user_id').val()

		
	}, function(data, status) {
		      
			 toastr.success('用户删除成功');
			 location.reload();

	});
	
}
