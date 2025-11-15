<?php

namespace App\Http\Controllers;

use App\Models\KelengkapanDokumen;
use App\Models\keterangan_sehat;
use App\Models\layak_terbang;
use App\Models\Permohonan;
use App\Models\User;
use App\Models\Verification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class processController extends Controller
{
    /**
     * Menampilkan halaman permohonan.
     */
    public function permohonan()
    {
        $userId = Auth::id();
        $data = Permohonan::where('user_id', $userId)->first(); // Ambil data berdasarkan user login

        return view('permohonan', compact('data'));
    }

    /**
     * Menyimpan data permohonan ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input (opsional tapi disarankan)
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
        ]);
 
        // Simpan ke database
        $permohonan = new Permohonan(); // Pastikan model Permohonan sudah dibuat dan di-import
        $permohonan->first_name = $request->first_name;
        $permohonan->middle_name = $request->middle_name;
        $permohonan->last_name = $request->last_name;
        $permohonan->user_id = Auth::user()->id;
        $permohonan->save();

        Alert::success('success', 'Data permohonan berhasil dikirim, Silahkan Mengisi Kelengkapan Dokumen.');
        
        return redirect('/kelengkapan-dokumen');
    }


    /**
     * Menampilkan halaman kelengkapan dokumen.
     */
    public function kelengkapanDokumen()
    {
        $userId = Auth::id();

        // Mengambil data kelengkapan dokumen terbaru berdasarkan 'created_at'
        $data = KelengkapanDokumen::where('user_id', $userId)->latest()->first();

        // Mengambil informasi user yang sedang login
        $user_Info = Auth::user();

        // Mengirim data ke view
        return view('kelengkapan-dokumen', compact('data', 'user_Info'));
    }


    /**
     * Menyimpan dokumen ke dalam sistem.
     */
    public function storeKelengkapanDokumen(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'practice_place' => 'required|string|max:255',
            'practice_address' => 'required|string',
            'document_ktp' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'document_str' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'document_ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png',
        ]);

        // Simpan file ke storage
        $ktp = $request->file('document_ktp')->store('dokumen', 'public');
        $str = $request->file('document_str')->store('dokumen', 'public');
        $ijazah = $request->file('document_ijazah')->store('dokumen', 'public');

        // Simpan data ke database
        KelengkapanDokumen::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'phone' => $request->phone,
            'practice_place' => $request->practice_place,
            'practice_address' => $request->practice_address,
            'document_ktp' => $ktp,
            'document_str' => $str,
            'document_ijazah' => $ijazah,
            'status' => 'Diproses',
        ]);

        Alert::success('success', 'Data Kelengkapan Dokumen Sudah diterima, Silahkan menunggu pemberitahuan untuk proses selanjutnya');

        return redirect()->route('kelengkapan-dokumen')->with('success', 'Dokumen berhasil diunggah!');
    }


    /**
     * Menampilkan halaman verifikasi lapangan.
     */
    public function verifikasiLapangan()
    {
        $userId = Auth::user()->id;
    
        // Mengambil data dari tabel 'verifications' dan mengurutkan berdasarkan 'created_at' dari yang terbaru
        $verifications = KelengkapanDokumen::where('user_id', $userId)
                                           ->orderBy('created_at', 'desc')
                                           ->get();
        // DATA SURAT LAYAK TERBANG
        $layakTerbang = layak_terbang::where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->get();

        // DATA SURAT Keterangan Sehat
        $keteranganSehat = keterangan_sehat::where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('verifikasi-lapangan', compact(
            'verifications', 
            'layakTerbang',
            'keteranganSehat',
        ));
    }
    

    public function dextroy($id)
    {
        $getDelete = KelengkapanDokumen::find($id);
        $getDelete->delete();

        Alert::success('success', 'Data Dihapus, Silahkan Mengisi Ulang Form Kelengkapan Dokumen');

        return redirect()->back();

    }

    /**
     * Menampilkan halaman penerbitan perizinan.
     */
    
    public function penerbitanPerizinan()
    {
        $userId = Auth::id(); // ambil ID user yang sedang login

        // Data kelengkapan dokumen
        $users = KelengkapanDokumen::where('status', 'Disetujui')
                    ->where('user_id', $userId)
                    ->paginate(10, ['*'], 'dokumen_page');

        // Data surat layak terbang
        $layakTerbang = layak_terbang::where('status', 'Disetujui')
                    ->where('user_id', $userId)
                    ->paginate(10, ['*'], 'layak_page');

        return view('penerbitan-perizinan', compact('users', 'layakTerbang'));
    }

    public function generateSuratIzin($id)
    {
        $getData = KelengkapanDokumen::with('getUser')->find($id);
    
        // Assuming you are generating a PDF or a document
        $pdf = PDF::loadView('Print.surat-izin', compact('getData'));
    
        // Download the generated PDF
        return $pdf->download('surat_izin_' . $getData->getUser->name . '.pdf');
    }
    


    // public function generateSuratIzin($id)
    // {
    //    $getData = KelengkapanDokumen::with('getUser')->find($id);
    //     return view('Print.surat-izin', compact('getData'));
    // }


    /**
     * Menampilkan halaman pengusulan ulang.
     */
    public function pengusulanUlang()
    {
        return view('pengusulan-ulang');
    }
}
