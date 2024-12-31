<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AprovalCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('client.duyetsanpham.list', compact('projects'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function approveProject(Request $request, string $id)
    {
        $project = Project::find($id);

        // Kiểm tra trạng thái của sản phẩm
        if ($project->status != 'completed') {
            return redirect()->back()->withErrors(['error' => 'Sản phẩm chưa hoàn thành, không thể duyệt!']);
        }

        // Cập nhật trạng thái sản phẩm (ví dụ: approved)
        $project->status = true;
        $project->save();

        return redirect('aproval_project')->with('success', 'Đã duyệt sản phẩm.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
