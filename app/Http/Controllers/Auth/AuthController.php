<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.nguoidung.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.nguoidung.login');
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

    }
    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return redirect('/login_nguoidung')->with("Đăng ký thành công");
    }

    public function login(LoginRequest $request)
    {
        // Chỉ bao gồm email và password để xác thực
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Kiểm tra nếu người dùng chọn "remember me"
        $remember = $request->has('remember_me'); // Kiểm tra đơn giản

        // Cố gắng xác thực người dùng
        if (Auth::attempt($login, $remember)) {
            // Kiểm tra vai trò của người dùng sau khi đăng nhập thành công
            $user = Auth::user(); // Lấy người dùng đã đăng nhập

            // Kiểm tra vai trò và chuyển hướng tương ứng
            if ($user->role === 'project_manager') {
                return redirect('/track_progress_pm')->with('success', 'Login thành công');
            } elseif ($user->role === 'member') {
                return redirect('/track_progress_member')->with('success', 'Login thành công');
            } elseif ($user->role === 'client') {
                return redirect('/track_progress_client')->with('success', 'Login thành công');
            } else {
                Auth::logout();
                return redirect()->back()->with("error", "Vai trò không hợp lệ!");
            }
        } else {
            return redirect()->back()->with("error", "Email hoặc password không đúng!");
        }
    }

}
