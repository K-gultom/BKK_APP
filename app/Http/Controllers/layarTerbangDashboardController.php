<?php

namespace App\Http\Controllers;

use App\Models\layak_terbang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class layarTerbangDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = layak_terbang::orderBy('created_at', 'desc');

        // Jika ada parameter search, filter berdasarkan nama pasien
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_pasien', 'like', '%' . $request->search . '%');
        }

        $dokumen = $query->paginate(10)->withQueryString(); // Pagination 10 per halaman

        return view('SuratLainnya.LayakTerbang.layakterbangDashboard', compact('dokumen'));
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
            'status' => 'required|string',
            'reason' => 'nullable|string',
        ]);

        $surat = layak_terbang::findOrFail($id);
        $surat->status = $request->status;
        $surat->save();

        Alert::success('Berhasil', 'Status permohonan berhasil diperbarui');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
