<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$projects = Project::where('owner_id',auth()->id())->get();

		return view('projects.index',compact('projects'));
	}

	public function create()
	{

		return view('projects.create');
	}


	public function edit(Project $project)
	{
    	// $project = Project::findOrFail($id);
		return view('projects.edit', compact('project'));
	}
 

	public function show(Project $project)
	{
    	// $project = Project::findOrFail($id);
    	// abort_unless(auth()->user()->owns($project),403);
    	abort_if($project->owner_id !== auth()->id(),403);
		return view('projects.show' , compact('project'));
	}


	public function update(Project $project)
	{
    	// $project = Project::findOrFail($id);

		$project->update(request(['title','description']));

    	// $project ->title = request('title');
    	// $project->description = request('description');
    	// $project->save();
		return redirect('/projects');
	}

	public function destroy(Project $project)
	{

		$project->delete();
		return redirect('/projects');
	}

	public function store()
	{

		$attributes = request()->validate(['title'=>['required','min:3'],
			'description'=>['required','min:3']
		]);

		$attributes['owner_id'] = auth()->id();

		Project::create($attributes);
		
    	// $project = new Project();

    	// $project->title = request('title');

    	// $project->description = request('description');


    	// $project->save();

		return redirect('/projects');
	}
}
