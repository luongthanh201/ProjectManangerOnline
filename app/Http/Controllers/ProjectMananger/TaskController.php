<?php

namespace App\Http\Controllers\ProjectMananger;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('user')->get();
        return view('projectmananger.phancongcongviec.list', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projectmananger.phancongcongviec.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $user = User::find($request->id_user);
        if (!$user || $user->role !== 'member') {
            return redirect()->back()->withErrors(['id_user' => 'Người dùng được chỉ định phải là thành viên.']);
        }
        $tasks = Task::create($request->all());
        if (!$tasks) {
            return redirect()->back()->with('error', 'Error creating task');
        }

        return redirect('assign_work')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tasks = Task::find($id);
        return view('projectmananger.phancongcongviec.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $tasks = Task::find($id);
        if (!$tasks) {
            return redirect('assign_work')->with('error', 'Task not found');
        }

        $tasks->update($request->all());

        return redirect('assign_work')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tasks = Task::find($id);
        $tasks->delete();
        return redirect('/assign_work')->with('success', 'Task deleted successfully');
    }
}
