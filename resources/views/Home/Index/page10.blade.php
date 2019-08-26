<!DOCTYPE html>
<html>
<head>
	<title>列表</title>
</head>
<body>
	<table>
		<tr>
			<th>id</th>
			<th>名字</th>
			<th>年龄</th>
			<th>性别</th>
			<th>头像</th>
		</tr>
		@foreach($list as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->age}}</td>
				<td>{{$v->sex}}</td>
				<td>
					<img src="{{ltrim($v->headimg,'.')}}" style="height: 50px;" />
				</td>
			</tr>
		@endforeach
	</table>
	<div  class="page">
		{{$list->links()}}
	</div>
</body>
</html>