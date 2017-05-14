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

$('#add_category_modal').modal_j({
	modal_title : '添加分类',
	modal_content : $('#add_category').html(),
	modal_footer : $('#add_category_footer').html()
});

$('#modify_category_modal').modal_j({
	modal_title : '修改分类信息',
	modal_content : $('#modify_category').html(),
	modal_footer : $('#modify_category_footer').html()
});

$('#add_category_button').click(function(){
	
	$.post(action_url + '/post/add_category', {
		category_name : $('#category_name').val(),
		parent_id : $('#parent_id').val(),
		category_status : $('#category_status').val()
		
	}, function(data, status) {
		      
		  toastr.success('分类添加成功');
			 ocation.reload();

	});

	
 
});

function modify_category(category_id,parent_id,category_name,status){
	
	$('#modify_category_id').val(category_id);
	$('#modify_category_name').val(category_name);
	$('#modify_parent_id').val(parent_id);
	$('#modify_category_status').val(status);
}


$('#modify_category_button').click(function(){
		modify_category_do();

});

function modify_category_do(){
	
	$.post(action_url + '/post/modify_category', {
		category_id : $('#modify_category_id').val(),
		category_name:$('#modify_category_name').val(),
		parent_id:$('#modify_parent_id').val(),
		category_status:$('#modify_category_status').val()
		
	}, function(data, status) {
		      
			 toastr.success('分类修改成功');
			 location.reload();

	});
	
}

function del_category(category_id){
	
	$.post(action_url + '/post/del_category', {
		category_id : category_id
		
	}, function(data, status) {
		      
			 toastr.success('分类删除成功');
			 location.reload();

	});
	
}