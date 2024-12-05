<?php

namespace App\Http\Controllers\ProjectMananger;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progress = Project::all();
        return view('projectmananger.theodoitiendo.list', compact('progress'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $progress = Project::find($id);
        return view('projectmananger.theodoitiendo.edit', compact('progress'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $progress = Project::find($id);
        if (!$progress) {
            return redirect('track_progress_pm')->with('error', 'Progress not found');
        }

        $progress->update($request->all());

        return redirect('track_progress_pm')->with('success', 'Progress updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $progress = Project::find($id);
        $progress->delete();
        return redirect('track_progress_pm');
    }
}
