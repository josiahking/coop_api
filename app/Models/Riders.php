<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riders extends Model
{
    use HasFactory;

    protected $keyType = "string";

    protected $hidden = [
        'password',
        'verified_email',
    ];
}
