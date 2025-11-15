<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class keterangan_sehat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_dokter',
        'nomor_sip',
        'instansi',
        'nama_pasien',
        'jenis_kelamin',
        'tanggal_lahir',
        'pekerjaan',
        'alamat',
        'tekanan_darah',
        'nadi',
        'tinggi_badan',
        'berat_badan',
        'suhu',
        'buta_warna',
        'riwayat_penyakit',
        'tujuan',
        'tempat_surat',
        'tanggal_surat',
        'status',
    ];

    /**
     * Get the user that owns the keterangan_sehat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
