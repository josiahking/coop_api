<?php

namespace App\Http\Controllers;

use App\Http\Requests\OtpRequest;
use App\Interfaces\OtpRepositoryInterface;
use App\Mail\Otp;
use Illuminate\Support\Facades\Mail;

class OtpRequestController extends Controller
{

    protected $otpRepository;

    public function __construct(OtpRepositoryInterface $otpRepository)
    {
        $this->otpRepository = $otpRepository;
    }

    public function sendOtp(OtpRequest $request)
    {
        $otp = $this->otpRepository->generateOtp();
        $passKey = $this->otpRepository->generatePassKey();
        //update DB
        $this->otpRepository->saveOtp($request->requested_by, $request->request_using, $request->request_for, $otp, $passKey);
        // Send the OTP via email...
        Mail::to($request->requested_by)->send(new Otp($otp));
        return response()->json([
            'data' => [
                'otp' => $otp,
                'passkey' => $passKey,
            ],
            'message' => "OTP has been sent to the provided " . $request->request_using,
        ], 201);
    }
}
