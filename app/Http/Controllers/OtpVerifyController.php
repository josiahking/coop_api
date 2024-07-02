<?php

namespace App\Http\Controllers;

use App\Http\Requests\OtpVerifyRequest;
use App\Interfaces\OtpRepositoryInterface;

class OtpVerifyController extends Controller
{
    protected $otpRepository;

    public function __construct(OtpRepositoryInterface $otpRepository)
    {
        $this->otpRepository = $otpRepository;
    }

    public function verifyOtp(OtpVerifyRequest $request)
    {
        $verified = $this->otpRepository->verifyOtp($request->otp, $request->passkey);

        return ($verified ? response(status : 204): response(status: 404));
    }
}
