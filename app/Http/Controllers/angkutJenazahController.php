<?php

namespace App\Http\Controllers;

use App\Models\angkut_jenazah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class angkutJenazahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('SuratLainnya.AngkutJenazah.angkutjenazah');
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
        $request->validate([
            'deceased_name' => 'required|string|max:255',
            'medical_certificate' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Upload dokumen medis jika ada
        $medicalCertificate = null;
        if ($request->hasFile('medical_certificate')) {
            $medicalCertificate = $request->file('medical_certificate')->store('medical_certificates', 'public');
        }

        angkut_jenazah::create([
            'user_id' => Auth::id(),

            // Data Jenazah
            'deceased_name' => $request->deceased_name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'identity_number' => $request->identity_number,
            'date_of_death' => $request->date_of_death,
            'place_of_death' => $request->place_of_death,
            'cause_of_death' => $request->cause_of_death,

            // Rincian Pengiriman
            'transport_method' => $request->transport_method,
            'carrier_name' => $request->carrier_name,
            'flight_number' => $request->flight_number,
            'shipping_datetime' => $request->shipping_datetime,
            'origin_city' => $request->origin_city,
            'destination_city' => $request->destination_city,
            'destination_address' => $request->destination_address,

            // Penerima / Penanggung Jawab
            'recipient_name' => $request->recipient_name,
            'recipient_phone' => $request->recipient_phone,

            // Penanganan Jenazah
            'embalmed' => $request->has('embalmed'),
            'embalming_notes' => $request->embalming_notes,
            'sealed_coffin' => $request->has('sealed_coffin'),
            'medical_certificate' => $medicalCertificate,
            'status' => 'Sedang Diproses',
        ]);

        Alert::success('Sukses', 'Data pengangkutan jenazah berhasil disimpan.');

        return redirect('/surat');
    }


    public function show(string $id)
    {
        // Ambil data Surat Layak Terbang beserta user yang mengajukan
        $data  = angkut_jenazah::with('user')->findOrFail($id);

        // Generate PDF menggunakan view Blade 'Print.surat-layak-terbang'
        $pdf = Pdf::loadView('Print.surat-angkut-jenazah', compact('data'));

        // Download PDF dengan nama file yang rapi
        return $pdf->download('surat-angkut-jenazah_Pemohon_' . $data ->user->name . '.pdf');
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

        $item = angkut_jenazah::where('user_id', Auth::id())->findOrFail($id);

        // Hapus file dokumen jika ada
        if ($item->medical_certificate && Storage::disk('public')->exists($item->medical_certificate)) {
            Storage::disk('public')->delete($item->medical_certificate);
        }

        $item->delete();

        Alert::success('Berhasil', 'Pengajuan berhasil dihapus');
        return redirect()->back();
    }
}
