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
			if(CheckBookCount()){
				NewBorrowRecord();
			}
			else
			{
				alert('书籍数量小于1');
			}
		}
	});	
});
//绑定Ajax生成归还按钮 的归还事件
$(document).on('click','button.btnreturn',function(){

	var $id=$(this).attr("id");
	//alert($id);
	NewreturnRecord($id)
})
function CheckBookCount(){
	if($("#Spaninfo").text()>0)
		return true;
	else
		return false;

}
function Login() {
	if (Check()) {
		LoginSuccess();
	}
}
function Check() {
	if ($("#inputId").val() == "") {
		alert("借阅用户不能为空！");
		$("#inputId").focus();
		return false;
	}
	return true;
}
function LoginSuccess() {
	$.ajax({
		type : "post",
		url : "/Ajax/SearchReader",
		data : {
			id : $("#inputId").val()
		},
		success : function (data) {
			$("#inputInfo").val(data[0]);
			$("#inputroles").val(data[1]);
			
			UpdataCordList();
			
		}
	});
}
function CheckBookId(){
	if($("#Bookid").val()==""){
	alert("书籍id不能为空！");
	$("#inputid").focus();
	return false;
	}
	return true;
}
//查询书籍
function SearchBook(){
	$.ajax({
		type:"post",
		url:"/Ajax/SearchBook",
		data:{
			id:$("#Bookid").val()
		},
		success:function(data){
		if(data){
		$("#TDid").text(data[0]);
		$("#TDname").text(data[1]);
		$("#TDwriter").text(data[2]);
		if(data[3]!=false){
		$("#Spaninfo").addClass("label-success");
		}
		$("#Spaninfo").text(data[4]);
		}

		
		
		else{
		ClearBookSelectList();
		alert("未找到书籍！");
		}
	
		}	
	})
}
//清空借阅记录列表
function ClearBookSelectList(){
        $("#TDid").text("");
		$("#TDname").text("");
		$("#TDwriter").text("");
		$("#TDinfo").text("");
		return true;
}
//添加新的借阅记录
function NewBorrowRecord(){
		$.ajax({
		type:"post",
		url:"/Ajax/addBorrowRecord",
		data:{
			id : $("#inputId").val(),
		Bookid:$("#Bookid").val()
		},
		success:function(){
		UpdataCordList();
		SearchBook();
		alert("完成借阅！");
		}	
	})
	
}
//添加新的归还记录
function NewreturnRecord($id){
		$.ajax({
		type:"post",
		url:"/Ajax/addReturnRecord",
		data:{
			id : $id
		},
		success:function(){
		UpdataCordList();
		SearchBook();
		alert("完成归还！");
		}	
	})
	
} 
//更新借阅记录
function UpdataCordList(){
//清空列表
$("#recordList").empty();
$.ajax({
		type:"post",
		url:"/Ajax/UpdataCordList",
		data:{
			id : $("#inputId").val(),
	
		},
		success:function(data){
		if(data){
		//更新借阅列表
		
		for(var i=0;i<data.length;i++){
		//生成每一条记录列表
		
		 var id=$("<td id='record_id"+data[i].id+"'></td>").text(data[i].id);
		var Bookname=$("<td id='record_Bookname'></td>").text(data[i].Book_name);
		var date=$("<td id='record_date'></td>").text(data[i].Borrowing_Record_date);
		var date1=$("<td id='record_date1'></td>").text(data[i].havetoreturn);
		var button=$("<button  id='"+data[i].id+"'></button>").text("归还");
		button.addClass("btnreturn");
	    var td1=$("<td></td>").append(button);
		var tr1=$("<tr id='"+data[i].id+"'></tr>").append(id,Bookname,date,date1,td1);
		  $("#recordList").append(tr1);

		}
		
		}
		else
		{$("#borrowList").text("无记录");}
		// $("#TDid").text(List[0].id);
		
		//alert("完成更新！");
		
		}	
	})
}

