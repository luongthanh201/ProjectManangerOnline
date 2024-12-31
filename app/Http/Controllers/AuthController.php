<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Log;

class AuthController extends Controller
{
    /**
     * Display the registration form.
     */
    public function index()
    {
        return view('auth.nguoidung.register');
    }

    /**
     * Display the login form.
     */
    public function create()
    {
        return view('auth.nguoidung.login');
    }

    /**
     * Register a new user.
     */
    public function register(RegisterRequest $request)
    {
        // Validate password
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        // Hash the password and create the user
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect('/login_nguoidung')->with("success", "Đăng ký thành công");
    }

    /**
     * Handle user login.
     */
    public function login(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember = false;
        if ($request->remember_me) {
            $remember = true;
        }

        if (Auth::attempt($login, $remember)) {
            $user = Auth::user();

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

    /**
     * Logout the user.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login_nguoidung');
    }
}
