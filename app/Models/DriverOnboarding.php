<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverOnboarding extends Model
{
    use HasFactory;

    protected $table = "drivers_profile";

    public $incrementing = false;

    protected $keyType = "string";

    protected $fillable = [
        'driver_id',
        'phone_number',
        'zip_code',
        'dob',
        'address',
        'city',
        'state',
        'emergency_contact_name',
        'emergency_coontact_relationship',
        'emergeny_contact_phone',
        'dmv_license_number',
        'dmv_license_exp_date',
        'tlc_license_number',
        'tlc_license_exp_date',
        'vehicle_make',
        'vehicle_model',
    ];
}
