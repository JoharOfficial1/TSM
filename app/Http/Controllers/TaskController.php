<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['name' => 'Tasks']
        ];
        
        $tasks = Task::with('project')->get();

        return view('admin.tasks.index')->with('breadcrumbs', $breadcrumbs)->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => route('tasks.index'), 'name' => 'Tasks'], ['name' => 'Create']
        ];

        $projects = Project::all();

        return view('admin.tasks.create')->with('breadcrumbs', $breadcrumbs)->with('projects', $projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->project_id = $request->project_id;
        $task->save();

        Session::flash('success', 'Task stored successfully');

        return redirect()->route('tasks.index');
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
        $task = Task::find($id);

        $breadcrumbs = [
            ['link' => route('tasks.index'), 'name' => 'Tasks'], ['name' => 'Edit']
        ];

        $projects = Project::all();

        return view('admin.tasks.edit')->with('breadcrumbs', $breadcrumbs)->with('projects', $projects)->with('task', $task);
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
        $task = Task::find($id);

        if ($task) {
            $task->name = $request->name;
            $task->description = $request->description;
            $task->priority = $request->priority;
            $task->project_id = $request->project_id;
            $task->save();

            Session::flash('success', 'Task updated successfully');
        } else {
            Session::flash('error', 'Task not found');
        }

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->delete();

            Session::flash('success', 'Task deleted successfully');
        } else {
            Session::flash('error', 'Task not found');
        }

        return redirect()->route('tasks.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTaskPriorityByAjax(Request $request)
    {
        $count = 1;

        foreach ($request->tasks_id as $taskId) {
            $task = Task::find($taskId);

            if ($task) {
                $task->priority = $count++;
                $task->save();
            }
        }

        return response()->JSON('Priority updated successfully');
    }
}
