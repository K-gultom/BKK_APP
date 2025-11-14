<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class layak_terbang extends Model
{
    use HasFactory;

    // protected $table = 'layak_terbang';

    protected $fillable = [
        'user_id',
        'nama_dokter',
        'nomor_sip',
        'instansi',
        'nama_pasien',
        'tgl_lahir',
        'usia',
        'jenis_kelamin',
        'nomor_identitas',
        'tgl_pemeriksaan',
        'tgl_penerbangan',
        'kota_asal',
        'kota_tujuan',
        'status',
    ];

    /**
     * Get the user that owns the layak_terbang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
