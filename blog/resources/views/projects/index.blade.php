@extends('layout')

@section('content')
	<h1 class="title">Projects</h1>

	<ul>
		@foreach($projects as $project)
		<li>
			<a href="/projects/{{$project->id}}">
				{{ $project->title}}
			</a>
		</li>
		
		@endforeach
	</ul><br>

	<div class="createProject">
		<a href="/projects/create">
			<button type="submit" class="button is-link">Create New Project</button>
		</a>
		
	</div>

	@endsection
