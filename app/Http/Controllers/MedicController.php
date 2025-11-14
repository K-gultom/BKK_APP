<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('screen.home');
        // return view('Print.surat-layak-terbang');
        // return view('Print.surat-izin');
        // return view('SuratLainnya.AngkutJenazah.angkutjenazah');
        // return view('SuratLainnya.LayakTerbang.layakterbang');
        // return view('SuratLainnya.KeteranganSehat.keterangansehat');
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
