<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login'); // Pastikan ada file login.blade.php di folder resources/views
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            Alert::success('Login Berhasil', 'Selamat datang, ' . $user->name);

            // Arahkan berdasarkan role
            if ($user->role === 'admin') {
                return redirect('/dashboard');
            }

            return redirect('/'); // default non-admin
        }

        Alert::error('Error', 'Email atau password salah.');
        return back();
    }
    public function logout()
    {
        Auth::logout();
        
        Alert::success('Logout', 'Anda Berhasil Logout');
        return redirect('/');
    }
}
