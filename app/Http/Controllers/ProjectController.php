<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['name' => 'Projects']
        ];
        
        $projects = Project::all();

        return view('admin.projects.index')->with('breadcrumbs', $breadcrumbs)->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => route('projects.index'), 'name' => 'Projects'], ['name' => 'Create']
        ];

        return view('admin.projects.create')->with('breadcrumbs', $breadcrumbs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->save();

        Session::flash('success', 'Project stored successfully');

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        $breadcrumbs = [
            ['link' => route('projects.index'), 'name' => 'Projects'], ['name' => 'Edit']
        ];

        return view('admin.projects.edit')->with('breadcrumbs', $breadcrumbs)->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if ($project) {
            $project->name = $request->name;
            $project->save();

            Session::flash('success', 'Project updated successfully');
        } else {
            Session::flash('error', 'Project not found');
        }

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if ($project) {
            $project->delete();

            Session::flash('success', 'Project deleted successfully');
        } else {
            Session::flash('error', 'Project not found');
        }

        return redirect()->route('projects.index');
    }
}
