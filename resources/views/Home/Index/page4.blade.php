@section('main')
<table>
	<tr>
		<th>id</th>
		<th>姓名</th>
		<th>年龄</th>
		<th>性别</th>
	</tr>
	@foreach($list as $k=>$v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->age}}</td>
			<td>
				@if($v->sex==1)
					男
				@elseif($v->sex==2)
					女
				@else
					未知
				@endif
			</td>
		</tr>
	@endforeach
</table>
@endsection

@extends('Public.index')
<style type="text/css">
	table{
		width:400px;
		
	}
	table tr td{
		text-align: center;
	}
	table tr:nth-child(odd){
		background: #efefef;
	}
</style>