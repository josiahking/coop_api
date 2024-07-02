<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class DriverAuthData extends Data
{
    public function __construct(
        public string $driver_id,
        public string $token,
        public string $token_expires
    ) {}
}
