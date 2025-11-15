<?php

namespace App\Http\Controllers;

use App\Models\keterangan_sehat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class keteranganSehatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('SuratLainnya.KeteranganSehat.keterangansehat');
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
        // Validasi input
        $request->validate([
            'nama_dokter' => 'required',
            'nomor_sip' => 'required',
            'instansi' => 'required',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'tekanan_darah' => 'required',
            'nadi' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'suhu' => 'required',
            'buta_warna' => 'required',
            'riwayat_penyakit' => 'nullable',
            'tujuan' => 'required',
            'tempat_surat' => 'required',
            'tanggal_surat' => 'required|date',
        ]);

        // Simpan data
        keterangan_sehat::create([
            'user_id' => Auth::id(),
            'nama_dokter' => $request->nama_dokter,
            'nomor_sip' => $request->nomor_sip,
            'instansi' => $request->instansi,
            'nama_pasien' => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'tekanan_darah' => $request->tekanan_darah,
            'nadi' => $request->nadi,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'suhu' => $request->suhu,
            'buta_warna' => $request->buta_warna,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'tujuan' => $request->tujuan,
            'tempat_surat' => $request->tempat_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'status' => 'Sedang Diproses',
        ]);

        Alert::success('success', 'Surat Keterangan Sehat Berhasil Diajukan');
        return redirect('/surat');
    }

    public function show(string $id)
    {
        // Ambil data Surat Layak Terbang beserta user yang mengajukan
        $surat = keterangan_sehat::with('user')->findOrFail($id);

        // Generate PDF menggunakan view Blade 'Print.surat-layak-terbang'
        $pdf = Pdf::loadView('Print.surat-keterangan-sehat', compact('surat'));

        // Download PDF dengan nama file yang rapi
        return $pdf->download('surat_keterangan_sehat_' . $surat->user->name . '.pdf');
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
        $surat = keterangan_sehat::find($id);

        if (!$surat) {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect()->back();
        }

        $surat->delete();

        Alert::success('Berhasil', 'Pengajuan berhasil dihapus');
        return redirect()->back();
    }
}
