<?php

namespace App\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface DriversRepositoryInterface
{
    public function newDrivers(): LengthAwarePaginator;

    public function activeDrivers(): LengthAwarePaginator;

    public function suspendedDrivers(): LengthAwarePaginator;
}
