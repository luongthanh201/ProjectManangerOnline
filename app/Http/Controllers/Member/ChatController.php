<?php

namespace App\Http\Controllers\Member;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect('/login_nguoidung')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }
        // Lấy danh sách người dùng và tin nhắn
        $users = User::all();
        $messages = Message::with('user')->get();

        return view('member.chat.chat', compact('users', 'messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function send(Request $request)
    {
        // Lưu tin nhắn
        $message = new Message();
        $message->user_id = auth()->id();
        $message->message = $request->message;
        $message->save();

        // Trả về để gửi thông báo cho tất cả người dùng qua broadcasting (nếu có)
        broadcast(new MessageSent(auth()->user(), $message));

        return redirect()->route('messages');
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
}
