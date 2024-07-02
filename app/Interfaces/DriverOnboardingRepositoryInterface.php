<?php

namespace App\Interfaces;

interface DriverOnboardingRepositoryInterface
{
    public function onboard(array $data);

    public function sendReviewEmail(string $driverId);

    public function verifyWithTlc(string $licenseNumber);
}
