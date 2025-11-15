<?php

namespace App\Http\Controllers;

use App\Models\keterangan_sehat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class keteranganSehatDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = keterangan_sehat::orderBy('created_at', 'desc');

        // Jika ada parameter search, filter berdasarkan nama pasien
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_pasien', 'like', '%' . $request->search . '%');
        }

        $dokumen = $query->paginate(10)->withQueryString(); // Pagination 10 per halaman

        return view('SuratLainnya.KeteranganSehat.keterangansehatDashboard', compact('dokumen'));
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
            'status' => 'required|string'
        ]);

        $dokumen = keterangan_sehat::findOrFail($id);
        $dokumen->status = $request->status;
        $dokumen->save();

        Alert::success('success', 'Status Berhasil Diperbarui');
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
