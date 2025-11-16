<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class angkut_jenazah extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'deceased_name',
        'birth_place',
        'birth_date',
        'gender',
        'nationality',
        'identity_number',
        'date_of_death',
        'place_of_death',
        'cause_of_death',
        'transport_method',
        'carrier_name',
        'flight_number',
        'shipping_datetime',
        'origin_city',
        'destination_city',
        'destination_address',
        'recipient_name',
        'recipient_phone',
        'embalmed',
        'embalming_notes',
        'sealed_coffin',
        'medical_certificate',
    ];

    /**
     * Get the user that owns the angkut_jenazah
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    
}
