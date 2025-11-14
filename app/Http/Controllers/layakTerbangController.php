<?php

namespace App\Http\Controllers;

use App\Models\layak_terbang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class layakTerbangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('SuratLainnya.LayakTerbang.layakterbang');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dokter'       => 'required|string',
            'nomor_sip'         => 'required|string',
            'instansi'          => 'required|string',
            'nama_pasien'       => 'required|string',
            'tgl_lahir'         => 'required|date',
            'usia'              => 'required|integer',
            'jenis_kelamin'     => 'required|string',
            'nomor_identitas'   => 'required|string',
            'tgl_pemeriksaan'   => 'required|date',
            'tgl_penerbangan'   => 'required|date',
            'kota_asal'         => 'required|string',
            'kota_tujuan'       => 'required|string',
        ]);

        // Tambahkan status default
        $validated['status'] = 'Sedang Diproses';
        $validated['user_id'] = Auth::id();

        layak_terbang::create($validated);

        Alert::success('success', 'Surat Layak Terbang Berhasil Diajukan');

        return redirect('verifikasi-lapangan');
    }


    public function show(string $id)
    {
        // Ambil data Surat Layak Terbang beserta user yang mengajukan
        $surat = layak_terbang::with('user')->findOrFail($id);

        // Generate PDF menggunakan view Blade 'Print.surat-layak-terbang'
        $pdf = Pdf::loadView('Print.surat-layak-terbang', compact('surat'));

        // Download PDF dengan nama file yang rapi
        return $pdf->download('surat_layak_terbang_' . $surat->user->name . '.pdf');
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

    public function destroy(string $id)
    {
        $surat = layak_terbang::find($id);

        if (!$surat) {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect()->back();
        }

        $surat->delete();

        Alert::success('Berhasil', 'Pengajuan berhasil dihapus');
        return redirect()->back();
    }

}
