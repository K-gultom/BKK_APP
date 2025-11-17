<?php

namespace App\Http\Controllers;

use App\Models\angkut_jenazah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class angkutJenazahDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $dokumen = angkut_jenazah::when($search, function ($query) use ($search) {
                            $query->where('deceased_name', 'LIKE', '%' . $search . '%');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('SuratLainnya.AngkutJenazah.angkutJenazahDashboard', compact('dokumen'));
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $data = angkut_jenazah::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        Alert::success('Sukses', 'Status berhasil diperbarui.');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
