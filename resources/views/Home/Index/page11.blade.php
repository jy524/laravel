<!DOCTYPE html>
<html>
<head>
	<title>验证码的使用</title>
</head>
<body>
	<div>
		<div class="err_box">
			@if(count($errors)>0)
				@foreach($errors->all() as $err)
					<p>{{$err}}</p>
				@endforeach
			@endif	
		</div>
		
		<form action="" method="post">
			<p>
				<span>姓名:</span>
				<input type="text" name="name" placeholder="请输入用户名" />
			</p>
			<p>
				<span>年龄:</span>
				<input type="text" name="age" placeholder="请输入年龄" />
			</p>
			<p>
				<span>性别:</span>
				<input type="text" name="sex" placeholder="请输入性别" />
			</p>
			<p>
				<span>验证码:</span>
				<input type="text" name="code" placeholder="请输入验证码" />
				<img src="{{captcha_src('math')}}"  onclick="this.src='{{captcha_src('mini')}}'" />
			</p>
			<p>
				<span>验证码2:</span>
				<input type="text" name="captcha" placeholder="请输入验证码" />
				{{captcha_img('math')}}
			</p>
			{{csrf_field()}}
			<p>
				<input type="submit" value="提交" />
			</p>
		</form>
	</div>

</body>
</html>