<?php

namespace App\Http\Controllers\ProjectMananger;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with(['user', 'project'])->get();
        return view('projectmananger.quanlytailieu.list', compact('documents'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function downloadDocument($id)
    {
        $document = Document::findOrFail($id); // Tìm tài liệu theo ID
        $filePath = storage_path('app/public/' . $document->file_path); // Đường dẫn file trong thư mục public

        // Kiểm tra nếu file tồn tại
        if (file_exists($filePath)) {
            // Trả về file để tải xuống
            return response()->download($filePath);
        }

        // Nếu không tìm thấy file, trả về thông báo lỗi
        return redirect()->back()->with('error', 'File không tồn tại.');
    }

}
