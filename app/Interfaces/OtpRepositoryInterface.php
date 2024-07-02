<?php

namespace App\Interfaces;

interface OtpRepositoryInterface
{
    public function generateOtp(): int;

    public function generatePassKey(): string;

    public function saveOtp(
        string $requestedBy,
        string $requestUsing,
        string $requestFor,
        int $otp,
        string $passKey
    ): bool;

    public function verifyOtp(string $otp, string $passkey): bool;
}
