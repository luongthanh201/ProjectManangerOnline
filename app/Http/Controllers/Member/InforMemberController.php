<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class InforMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth::user();
        return view('member.thongtincanhan.update', compact('users'));
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
    public function store(ProfileRequest $request)
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
    public function update(ProfileRequest $request)
    {
        // Lấy người dùng hiện tại
        $user = auth()->user(); // Nếu đã đăng nhập, bạn có thể lấy người dùng hiện tại

        // Lấy dữ liệu đã được xác thực từ ProfileRequest
        $validatedData = $request->validated();

        // Kiểm tra và mã hóa mật khẩu nếu trường password được gửi lên
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            // Nếu không cập nhật mật khẩu, loại bỏ trường password
            unset($validatedData['password']);
        }

        // Cập nhật thông tin người dùng
        $user->update($validatedData);

        // Trả về phản hồi
        return redirect()->back()->with('success', 'Cập nhật thông tin cá nhân thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
