<div id="template_errors">		
			@if(count($errors) > 0)
						
						<div class="alert alert-danger">
							<strong>错误!</strong> 你的输入有些问题.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
		@endif
</div>	