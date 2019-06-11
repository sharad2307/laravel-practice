<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Create a new project</h1>

	<form method="POST" action="/projects">

		{{ csrf_field() }}

		<div>
			<input type="text" name="title" placeholder="project title">

		</div>

		<div>
			<textarea name="description" placeholder="project description">
				
			</textarea>

		</div>

		<div>
			<button type="submit">Create project</button>
		</div>
		
	</form>

</body>
</html>