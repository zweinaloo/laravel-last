
$(document).ready(function () {
	/* Datatables初始化*/
	var id = -1;//
	$('#example').dataTable({
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
				
	}).makeEditable();
	

	$('.tidyTime').tidyTime({
		time : '08:15',
		before : 'It\'s ',
		after : ' and I\'m feeling good!',
		periodOfDay : true,
		callback : tidyTimeFunction
	});
});