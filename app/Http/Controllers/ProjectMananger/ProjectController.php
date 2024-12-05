<?php

namespace App\Http\Controllers\ProjectMananger;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projectmananger.quanlyduan.list', compact('projects')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projectmananger.quanlyduan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $projects = Project::create($request->all());
        if (!$projects) {
            return redirect()->back()->with('error', 'Error creating project');
        }

        return redirect('project_mananger')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projects = Project::find($id);
        return view('projectmananger.quanlyduan.edit', compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        $projects = Project::find($id);
        if (!$projects) {
            return redirect('project_mananger')->with('error', 'Project not found');
        }

        $projects->update($request->all());

        return redirect('project_mananger')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projects = Project::find($id);
        $projects->delete();
        return redirect('/project_mananger')->with('success', 'Project deleted successfully');
    }
}
