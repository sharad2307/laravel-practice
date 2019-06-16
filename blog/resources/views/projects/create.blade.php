@extends('layout')

@section('content')
<h1 class="title">Create a new project</h1>

<form method="POST" action="/projects">

	{{ csrf_field() }}

		<!-- <div>
			<input type="text" name="title" placeholder="project title" required>

		</div>

		<div>
			<textarea name="description" placeholder="project description" required>
				
			</textarea>

		</div> -->
		<div class="field">
			<label class="label" for="title" >
				Title
			</label>

			<div class="control">
				<input type="text" class="input {{ $errors->has('title')? 'is-danger': ''}}" name="title" placeholder="Title" value="{{old('title')}}">
			</div>
		</div>	

		<div class="field">
			<label class="label" for="description">Description</label>

			<div class="control">
				<textarea name="description" class="textarea {{ $errors->has('title')? 'is-danger': ''}}">{{old('description')}}</textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Create Project</button>
			</div>
		</div>

		@if ($errors->any())
		<div class="notification is-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error}}</li>
				@endforeach
			</ul>
			
		</div>
		@endif

	</form>


	@endsection