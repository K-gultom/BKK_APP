<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $data  = User::where('role', 'admin')
                    ->when($search, function($query, $search) {
                        $query->where('name', 'like', "%{$search}%")
                              ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->latest()
                    ->paginate(5);

        return view('admin.Admin.admin', compact('data'));
    }
    
    public function dashboard()
    {
        return view('admin.Dashboard.dashboard');
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
        $save->role = 'admin';
        // dd($save);
        $save->save();
        
        Alert::success('Success', 'Data Admin berhasil ditambahkan');
        
        return redirect()->back();
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
    public function edittt(string $id)
    {
        $getData = User::find($id);
        return view('admin.Admin.edit-admin', compact('getData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $save = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email' . $save->id,
            'phone' => 'required|min:10',
            'address' => 'required',
            'password' => 'nullable|min:6',
        ]);

        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->address = $request->address;

        if ($request->filled('password')) {
            $save->password = Hash::make($request->password);
        }
        $save->role = 'admin';
        // dd($save);
        $save->save();
        
        Alert::success('Success', 'Data Admin berhasil diperbaharui');
        
        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        Alert::success('Success', 'Data Admin berhasil dihapus');

        return redirect()->back();
    }
}
