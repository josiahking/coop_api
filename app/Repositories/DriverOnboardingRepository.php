<?php
namespace App\Repositories;

use App\Interfaces\DriverOnboardingRepositoryInterface;
use App\Mail\DriverOnboardingReviewMail;
use App\Models\Auth\DriverAuthModel;
use App\Models\DriverOnboarding;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class DriverOnboardingRepository implements DriverOnboardingRepositoryInterface
{

    public function onboard(array $data)
    {
        $driverProfile = new DriverOnboarding();
        $driverProfile->driver_id = $data['driver_id'];
        $driverProfile->phone_number = $data['phone_number'];
        $driverProfile->dob = $data['date_of_birth'];
        $driverProfile->zip_code = $data['zip_code'];
        $driverProfile->address = $data['address'];
        //$driverProfile->city = $data['city'];
        //$driverProfile->state = $data['state'];
        $driverProfile->emergency_contact_name = $data['emergency_contact_name'];
        $driverProfile->emergency_contact_relationship = $data['emergency_contact_relationship'];
        $driverProfile->emergency_contact_phone = $data['emergency_contact_phone'];
        $driverProfile->dmv_license = $data['dmv_license'];
        $driverProfile->dmv_license_exp_date = $data['dmv_license_exp_date'];
        $driverProfile->tlc_license = $data['tlc_license'];
        $driverProfile->tlc_license_exp_date = $data['tlc_license_exp_date'];
        $driverProfile->vehicle_make = $data['vehicle_make'];
        $driverProfile->vehicle_model = $data['vehicle_model'];
        $driverProfile->vehicle_class = $data['vehicle_class'];
        $driverProfile->vehicle_plate_number = $data['vehicle_plate_number'];
        $driverProfile->registration_exp_date = $data['vehicle_registration_exp_date'];
        $driverProfile->seating_capacity = $data['seat_capacity'];
        $driverProfile->luggage_capacity = $data['luggage_capacity'];
        $driverProfile->seat_belt_count = $data['seat_belt'];
        $driverProfile->vehicle_insurer = $data['insurance_company'];
        $driverProfile->insurer_policy_number = $data['insurer_policy_number'];
        $driverProfile->insurance_exp_date = $data['insurance_exp_date'];
        return $driverProfile->save();
    }

    public function sendReviewEmail(string $driverId): void
    {
        $user = DriverAuthModel::where('id', $driverId)->first();
        Mail::to($user->email)->send(new DriverOnboardingReviewMail($user->first_name));
    }

    public function verifyWithTlc(string $licenseNumber)
    {
        $url = env('SOCRATA_NEWYORK_ENDPOINT') . env('SOCRATA_DATASET_ID') . '.json';
        $response = Http::get($url, [
            "\$\$app_token" => env('SOCRATA_APP_TOKEN'),
            "vehicle_license_number" => $licenseNumber,
        ]);
        //dd($response->json());
    }
}
