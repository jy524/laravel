<!DOCTYPE html>
<html>
<head>
	<title>文件上传</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="headimg" />
		{{csrf_field()}}
		<input type="submit" value="上传" />
	</form>

</body>
</html>