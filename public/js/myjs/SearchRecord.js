$.ajaxSetup({
	headers : {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});
$(document).ready(function () {
	$("#btnReaderSearch").click(function () {
		Login();
	});
	
	$("#btnBookSearch").click(function () {
		if(CheckBookId()){
		SearchBook();
		}
	});
		$("#btnNewBorrowRecord").click(function () {
		if(CheckBookId()&&Check()){
		NewBorrowRecord();
		}
	});
	

	
	
});
//绑定Ajax生成归还按钮 的归还事件
$(document).on('click','button.btnreturn',function(){

	var $id=$(this).attr("id");
	//alert($id);
	NewreturnRecord($id)
	

})

