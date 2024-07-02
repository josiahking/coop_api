<?php
namespace App\Repositories;

use App\Interfaces\DriversRepositoryInterface;
use App\Models\Drivers;
use Illuminate\Pagination\LengthAwarePaginator;

class DriversRepository implements DriversRepositoryInterface
{

    public function newDrivers(): LengthAwarePaginator
    {
        return Drivers::where('status', 0)->paginate();
    }

    public function activeDrivers(): LengthAwarePaginator
    {
        return Drivers::where('status', 1)->paginate();
    }

    public function suspendedDrivers(): LengthAwarePaginator
    {
        return Drivers::where('status', 2)->paginate();
    }
}
