<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Storage;

class DocumentMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        return view('member.guitailieu.list', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.guitailieu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        // Kiểm tra nếu tệp được tải lên
        if ($request->hasFile('file_path')) {
            // Lấy tệp từ yêu cầu
            $file = $request->file('file_path');

            // Đặt tên tệp mới để tránh trùng lặp
            $filename = time() . '_' . $file->getClientOriginalName();

            // Đường dẫn lưu tệp
            $filePath = 'uploads/documents/';

            // Kiểm tra và tạo thư mục nếu chưa tồn tại
            if (!Storage::exists('public/storage/' . $filePath)) {
                Storage::makeDirectory('public/storage/' . $filePath);
            }

            // Lưu tệp vào thư mục `storage/uploads/reports/`
            $file->storeAs('storage/' . $filePath, $filename);

            // Lưu thông tin báo cáo vào cơ sở dữ liệu
            $documents = Document::create([
                'name' => $request->input('name'),
                'file_path' => $filePath . $filename, // Đường dẫn tệp
                'type' => $request->input('type'),
                'user_id' => $request->input('user_id'),
                'project_id' => $request->input('project_id'),
                'uploaded_at' => $request->input('uploaded_at')
            ]);

            if ($documents) {
                return redirect('/document_submitted')->with('success', 'Báo cáo đã được tạo thành công.');
            } else {
                return redirect('/document_submitted')->with('error', 'Có lỗi xảy ra khi tạo báo cáo.');
            }
        } else {
            return redirect('/document_submitted')->with('error', 'Bạn phải tải lên một tệp báo cáo.');
        }
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
    public function update(DocumentRequest $request, string $id)
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
}
