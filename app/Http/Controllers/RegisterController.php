<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Auth.register'); // Tampilkan halaman register
    }

    public function test(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:10',
            'address' => 'required',
            'password' => 'required|min:6',
        ]);

        $save =  new User();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->address = $request->address;
        $save->password = Hash::make($request->password);
        $save->role = $request->role;
        // dd($save);
        $save->save();
        
        Alert::success('Register Berhasil', 'Register Berhasil');
        
        return redirect('/login');
    
    }
}
