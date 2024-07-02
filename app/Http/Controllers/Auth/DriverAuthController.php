<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\DriverLoginRequest;
use App\Http\Requests\Auth\DriverRegistrationRequest;
use App\Interfaces\Auth\DriverAuthRepositoryInterface;
use Illuminate\Validation\ValidationException;

class DriverAuthController
{

    protected $driverAuthRepository;

    public function __construct(DriverAuthRepositoryInterface $driverAuthRepository)
    {

        $this->driverAuthRepository = $driverAuthRepository;

    }

    public function register(DriverRegistrationRequest $request)
    {
        $data = $request->validated();
        $result = $this->driverAuthRepository->register($data);
        return response()->json([
            'data' => $result,
            'message' => 'Driver signup successful',
        ], 201);
    }

    public function login(DriverLoginRequest $request)
    {
        $login = $this->driverAuthRepository->login($request->email, $request->password);
        if (!$login) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        //create token
        $result = $this->driverAuthRepository->createToken($request->email);
        return response()->json([
            'data' => $result,
            'message' => 'Login successful',
        ]);
    }

}
