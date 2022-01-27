<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $project = Project::all();
        return view('projects.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
       return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
       $project = new Project();

       $project->client_id = $request->client_id;
       $project->name = $request->name;
       $project->description = $request->description;
       $project->budget = $request->budget;
       $project->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project) {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project) {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project) {
        $project->client_id = $request->client_id;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->budget = $request->budget;
        $project->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project){
        $project->delete();
    }
}
