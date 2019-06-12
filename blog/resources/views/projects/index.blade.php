<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>&nbsp;&nbsp;&nbsp;Projects</h1>
	@foreach($projects as $project)
	<ul><li>{{ $project->title}}</li></ul>
	
	@endforeach
</body>
</html>