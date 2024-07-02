<?php

namespace App\Http\Controllers;

use App\Interfaces\DriversRepositoryInterface;
use App\Models\Drivers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DriversController extends Controller
{

    public $driversRepository;

    public function __construct(DriversRepositoryInterface $driversRepository)
    {
        $this->driversRepository = $driversRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = Drivers::paginate();
        return response()->json($data);
    }

    public function newDrivers(): JsonResponse
    {
        return response()->json($this->driversRepository->newDrivers());
    }

    public function activeDrivers(): JsonResponse
    {
        return response()->json($this->driversRepository->activeDrivers());
    }

    public function suspendedDrivers()
    {
        return response()->json($this->driversRepository->suspendedDrivers());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Drivers $drivers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drivers $drivers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drivers $drivers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drivers $drivers)
    {
        //
    }
}
