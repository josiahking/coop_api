<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RiderLoginRequest;
use App\Http\Requests\Auth\RiderRegistrationRequest;
use App\Interfaces\Auth\RiderAuthRepositoryInterface;
use Illuminate\Validation\ValidationException;

class RiderAuthController
{
    protected $riderAuthRepository;

    public function __construct(RiderAuthRepositoryInterface $riderAuthRepository)
    {

        $this->riderAuthRepository = $riderAuthRepository;

    }

    public function register(RiderRegistrationRequest $request)
    {
        $data = $request->validated();
        $result = $this->riderAuthRepository->register($data);
        return response()->json([
            'data' => $result,
            'message' => 'Rider signup successful',
        ], 201);
    }

    public function login(RiderLoginRequest $request)
    {
        $login = $this->riderAuthRepository->login($request->email, $request->password);
        if (!$login) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        //create token
        $result = $this->riderAuthRepository->createToken($request->email);
        return response()->json([
            'data' => $result,
            'message' => 'Login successful',
        ]);
    }

    public function logout(RiderLoginRequest $request) //logout request
    {
        //$request->user()->tokens()->delete();
        //return response()->json(['message' => 'Logged out successfully']);
    }
}
