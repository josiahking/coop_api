<?php
namespace App\Repositories;

use App\Interfaces\OtpRepositoryInterface;
use App\Models\Auth\DriverAuthModel;
use App\Models\Otp;
use Illuminate\Support\Str;

class OtpRepository implements OtpRepositoryInterface
{
    public function generateOtp(): int
    {
        return rand(1000, 9999); // Generate a 4-digit OTP
    }

    public function generatePassKey(): string
    {
        return Str::random(40);
    }

    public function saveOtp(string $requestedBy, string $requestUsing, string $requestFor, int $otp, string $passKey): bool
    {
        $saved = Otp::create([
            'requested_by' => $requestedBy,
            'request_using' => $requestUsing,
            'request_for' => $requestFor,
            'otp' => $otp,
            'passkey' => $passKey,
        ]);
        return !$saved ? true : false;
    }

    public function verifyOtp(string $otp, string $passkey): bool
    {
        $otp = Otp::where('otp', $otp)->where('passkey', $passkey)->first();
        if (!is_null($otp)) {
            //mark email as verified
            if ($otp->request_for == 'driver') {
                DriverAuthModel::where('email', $otp->requested_by)->update(['verified_email' => 1]);
            }
        }
        return $otp ? true : false;

    }
}
