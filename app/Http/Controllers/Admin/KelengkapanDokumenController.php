<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelengkapanDokumen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelengkapanDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = KelengkapanDokumen::query();

        // Pencarian jika ada input 'search'
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%")
                ->orWhere('nik', 'like', "%$search%");
        }

        $dokumen = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.clinics.KelengkapanDokumen.KelengkapanDokumen', compact('dokumen'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'reason' => 'nullable|string|max:255',
        ]);

        $dokumen = KelengkapanDokumen::find($id);

        if ($dokumen) {
            $dokumen->status = $request->status;
            $dokumen->reason = $request->reason;  // Alasan jika ditolak
            $dokumen->save();
            
            Alert::success('Berhasil', 'Status permohonan berhasil diperbarui');
            
            return redirect()->route('admin.kelengkapan-dokumen.index');
        }

        Alert::error('Gagal', 'Dokumen tidak ditemukan');
        return redirect()->back();
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
