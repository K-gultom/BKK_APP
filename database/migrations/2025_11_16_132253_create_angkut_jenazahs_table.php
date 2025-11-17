<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('angkut_jenazahs', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id'); // user login

            // DATA JENAZAH
            $table->string('deceased_name');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('identity_number')->nullable();
            $table->dateTime('date_of_death')->nullable();
            $table->string('place_of_death')->nullable();
            $table->text('cause_of_death')->nullable();

            // RINCIAN PENGIRIMAN
            $table->string('transport_method')->nullable();
            $table->string('carrier_name')->nullable();
            $table->string('flight_number')->nullable();
            $table->dateTime('shipping_datetime')->nullable();
            $table->string('origin_city')->nullable();
            $table->string('destination_city')->nullable();
            $table->text('destination_address')->nullable();

            // PENANGGUNG JAWAB
            $table->string('recipient_name')->nullable();
            $table->string('recipient_phone')->nullable();

            // PENANGANAN JENAZAH
            $table->boolean('embalmed')->default(false);
            $table->text('embalming_notes')->nullable();
            $table->boolean('sealed_coffin')->default(true);
            $table->string('medical_certificate')->nullable();


            // Status
            $table->string('status')->default('Sedang Diproses');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angkut_jenazahs');
    }
};
