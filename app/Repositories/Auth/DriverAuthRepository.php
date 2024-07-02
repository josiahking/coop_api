<?php

namespace App\Repositories\Auth;

use App\Data\DriverAuthData;
use App\Interfaces\Auth\DriverAuthRepositoryInterface;
use App\Models\Auth\DriverAuthModel;
use Illuminate\Support\Facades\Hash;

class DriverAuthRepository implements DriverAuthRepositoryInterface
{

    public function register($data): DriverAuthData
    {
        // Create a new driver and save to the database
        $driver = DriverAuthModel::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Generate a token for the driver
        $token = $driver->createToken('driver-token', ['*'], now()->addDays(30));

        return DriverAuthData::from([
            'driver_id' => $driver->id,
            'token' => $token->plainTextToken,
            'token_expires' => $token->accessToken->expires_at->getTimestamp(),
        ]);
    }

    public function login(string $email, string $password): bool
    {
        $user = DriverAuthModel::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return false;
        }
        return true;
    }

    public function createToken(string $email): DriverAuthData
    {
        $driver = DriverAuthModel::where('email', $email)->first();
        $token = $driver->createToken('driver-token', ['*'], now()->addDays(30));

        return DriverAuthData::from([
            'driver_id' => $driver->id,
            'token' => $token->plainTextToken,
            'token_expires' => $token->accessToken->expires_at->getTimestamp(),
        ]);
    }
}
