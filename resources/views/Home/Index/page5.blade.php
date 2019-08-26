<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>测试</title>
</head>
<body>
	<div>
		@if(count($errors)>0)
			@foreach($errors->all() as $error)
				<p>{{$error}}</p>
			@endforeach
		@endif
	</div>
	<form method="post" action="">
		<p>
			<span>姓名:</span><input type="text" name="name" placeholder="请输入用户名" />
		</p>
		<p>
			<span>年龄:</span><input type="text" name="age" placeholder="请输入年龄" />
		</p>
		<p>
			<span>性别:</span><input type="text" name="sex" placeholder="请输入性别" />
		</p>
		{{-- csrf的两种形式的写法 --}}
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		{{csrf_field()}}
		<p>
			<input type="submit" value="提交" />
		</p>
	</form>
</body>
</html>