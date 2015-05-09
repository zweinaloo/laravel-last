$.ajaxSetup({
	headers : {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});
$(document).ready(function () {
	$("#btnOnExact").click(function () {
		OnExactSearchSubmit();
	});
});
function OnExactSearchSubmit(){
			alert('dd');
			$('#Exact').dataTable( {
		        "bProcessing": true,
				"bServerSide": true,
				"sPaginationType": "full_numbers",
				"sAjaxSource": "BookFind/AjaxOnExact",
		       "oLanguage" : {
			"sLengthMenu" : "每页显示 _MENU_ 条记录",
			"sZeroRecords" : "抱歉， 没有找到",
			"sInfo" : "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
			"sInfoEmpty" : "没有数据",
			"sInfoFiltered" : "(从 _MAX_ 条数据中检索)",
			"oPaginate" : {
				"sFirst" : "首页",
				"sPrevious" : "前一页",
				"sNext" : "后一页",
				"sLast" : "尾页"

			},
			"sZeroRecords" : "没有检索到数据",
			"sProcessing" : "<img src='./loading.gif' />"
			}
		        
		    } );
		    alert('bb');
			
}

			
