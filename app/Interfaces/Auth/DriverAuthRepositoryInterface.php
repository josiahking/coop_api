<?php

namespace App\Interfaces\Auth;

use App\Data\DriverAuthData;

interface DriverAuthRepositoryInterface
{

    /**
     * Register driver
     *
     * @param array $data
     * @return DriverAuthData
     */
    public function register(array $data): DriverAuthData;

    /**
     * Login to driver account
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
    public function createToken(string $email): DriverAuthData;
}
