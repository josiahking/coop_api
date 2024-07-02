<?php

namespace App\Repositories\Auth;

use App\Data\RiderAuthData;
use App\Interfaces\Auth\RiderAuthRepositoryInterface;
use App\Models\Auth\RiderAuthModel;
use Illuminate\Support\Facades\Hash;

class RiderAuthRepository implements RiderAuthRepositoryInterface
{

    public function register($data): RiderAuthData
    {
        // Create a new rider and save to the database
        $rider = RiderAuthModel::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'verified_email' => true,
        ]);

        // Generate a token for the rider
        $token = $rider->createToken('rider-token', ['*'], now()->addDays(60));

        return RiderAuthData::from([
            'rider_id' => $rider->id,
            'token' => $token->plainTextToken,
            'token_expires' => $token->accessToken->expires_at->getTimestamp(),
        ]);
    }

    public function login(string $email, string $password): bool
    {
        $user = RiderAuthModel::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return false;
        }
        return true;
    }

    public function createToken(string $email): RiderAuthData
    {
        $rider = RiderAuthModel::where('email', $email)->first();
        $token = $rider->createToken('rider-token', ['*'], now()->addDays(60));

        return RiderAuthData::from([
            'rider_id' => $rider->id,
            'token' => $token->plainTextToken,
            'token_expires' => $token->accessToken->expires_at->getTimestamp(),
        ]);
    }
}
