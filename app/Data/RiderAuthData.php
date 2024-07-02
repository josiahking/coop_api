<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class RiderAuthData extends Data
{
    public function __construct(
        public string $rider_id,
        public string $token,
        public string $token_expires
    ) {}
}
