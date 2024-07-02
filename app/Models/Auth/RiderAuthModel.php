<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class RiderAuthModel extends Authenticatable
{
    use HasFactory, HasUuids, HasApiTokens;

    protected $table = "riders";

    public $incrementing = false;

    protected $keyType = "string";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
    ];
}
