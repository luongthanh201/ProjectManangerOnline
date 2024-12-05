<?php

namespace App\Http\Controllers\ProjectMananger;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::with('user')->get();
        return view('projectmananger.baocao.list', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projectmananger.baocao.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        // Kiểm tra nếu tệp được tải lên
        if ($request->hasFile('file_path')) {
            // Lấy tệp từ yêu cầu
            $file = $request->file('file_path');

            // Đặt tên tệp mới để tránh trùng lặp
            $filename = time() . '_' . $file->getClientOriginalName();

            // Đường dẫn lưu tệp
            $filePath = 'uploads/reports/';

            // Kiểm tra và tạo thư mục nếu chưa tồn tại
            if (!Storage::exists('public/storage/' . $filePath)) {
                Storage::makeDirectory('public/storage/' . $filePath);
            }

            // Lưu tệp vào thư mục `storage/uploads/reports/`
            $file->storeAs('storage/' . $filePath, $filename);

            // Lưu thông tin báo cáo vào cơ sở dữ liệu
            $report = Report::create([
                'name' => $request->input('name'),
                'file_path' => $filePath . $filename, // Đường dẫn tệp
                'user_id' => $request->input('user_id'),
                'created_date' => $request->input('created_date'),
                'status' => $request->input('status', 'pending'), // Mặc định trạng thái là 'pending'
            ]);

            if ($report) {
                return redirect('/report_mananger')->with('success', 'Báo cáo đã được tạo thành công.');
            } else {
                return redirect('/report_mananger')->with('error', 'Có lỗi xảy ra khi tạo báo cáo.');
            }
        } else {
            return redirect('/report_mananger')->with('error', 'Bạn phải tải lên một tệp báo cáo.');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reports = Report::find($id);
        $reports->delete();
        return redirect('/report_mananger')->with('Đã xóa báo cáo thành công');
    }
    public function downloadReport($id)
    {
        // Tìm báo cáo theo ID
        $report = Report::findOrFail($id); // Tìm tài liệu theo ID
        $filePath = storage_path('app/public/' . $report->file_path); // Đường dẫn file trong thư mục public (dùng storage/app/public)

        // Kiểm tra nếu file tồn tại
        if (file_exists($filePath)) {
            // Trả về file để tải xuống
            return response()->download($filePath);
            
        }

        // Nếu không tìm thấy file, trả về thông báo lỗi
        return redirect()->back()->with('error', 'File không tồn tại.');
    }

}
