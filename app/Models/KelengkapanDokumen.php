<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KelengkapanDokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'nik',
        'email',
        'phone',
        'practice_place',
        'practice_address',
        'document_ktp',
        'document_str',
        'document_ijazah',
        'status', 'reason', 
    ];

   /**
    * Get the getUser that owns the KelengkapanDokumen
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function getUser(): BelongsTo
   {
       return $this->belongsTo(User::class, 'user_id', 'id');
   }
}
