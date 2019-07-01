<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
			// $projects = auth()-user()->projects;
		// $projects = Project::where('owner_id',auth()->id())->get();

		return view('projects.index',[
			'projects'=> auth()->user()->projects
		]);
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
    	

		$project->update($this->validateProject());

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

		$attributes= $this->validateProject();
		$attributes['owner_id'] = auth()->id();

		$project = Project::create($attributes);
		
    	// $project = new Project();

    	// $project->title = request('title');

    	// $project->description = request('description');


    	// $project->save();

    	\Mail::to('manuandmehrotra@gmail.com')->send(
    		new ProjectCreated($project)
    	);

		return redirect('/projects');
	}

	protected function validateProject()
	{

		return request()->validate(['title'=>['required','min:3'],
			'description'=>['required','min:3']
		]);
	}
}
