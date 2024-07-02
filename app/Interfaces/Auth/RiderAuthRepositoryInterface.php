<?php

namespace App\Interfaces\Auth;

use App\Data\RiderAuthData;

interface RiderAuthRepositoryInterface
{
    /**
     * Register rider
     *
     * @param array $data
     * @return RiderAuthData
     */
    public function register(array $data): RiderAuthData;

    /**
     * Login to rider account
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool;

    /**
     * Create token after login auth
     *
     * @param string $email
     * @return DriverAuthData
     */
    public function createToken(string $email): RiderAuthData;
}
