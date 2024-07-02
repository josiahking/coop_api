<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverOnboardingRequest;
use App\Interfaces\DriverOnboardingRepositoryInterface;

class DriverOnboardingController extends Controller
{

    public $driverOnboardRepository;

    public function __construct(DriverOnboardingRepositoryInterface $driverOnboardRepository)
    {
        $this->driverOnboardRepository = $driverOnboardRepository;
    }

    public function onboard(DriverOnboardingRequest $request)
    {
        $result = $this->driverOnboardRepository->onboard($request->all());
        if ($result) {
            //send mail
            $this->driverOnboardRepository->sendReviewEmail($request->driver_id);
            //dispatch verification
            $this->driverOnboardRepository->verifyWithTlc($request->tlc_license);
        }
        return response()->json([
            'message' => $result ? "Profile is currently being reviewed, an email will be sent to you on the outcome" : "An error occurred!",
        ], $result ? 201 : 400);
    }

}
