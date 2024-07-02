<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    protected $table = "otp";
    protected $fillable = [
        'requested_by',
        'request_using',
        'request_for',
        'otp',
        'passkey',
    ];
}
