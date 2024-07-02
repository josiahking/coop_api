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
        Schema::create('drivers_profile', function (Blueprint $table) {
            $table->uuid('driver_id')->primary();
            $table->string('phone_number');
            $table->string('dob');
            $table->string('zip_code');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('emergency_contact_phone');
            $table->string('dmv_license');
            $table->string('dmv_license_exp_date');
            $table->string('tlc_license');
            $table->string('tlc_license_exp_date');
            $table->string('vehicle_make');
            $table->string('vehicle_model');
            $table->string('vehicle_class');
            $table->string('vehicle_plate_number');
            $table->string('registration_exp_date')->comment('For vehicle');
            $table->string('seating_capacity');
            $table->string('seat_belt_count');
            $table->string('luggage_capacity');
            $table->string('vehicle_insurer');
            $table->string('insurer_policy_number');
            $table->string('insurance_exp_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers_profile');
    }
};
