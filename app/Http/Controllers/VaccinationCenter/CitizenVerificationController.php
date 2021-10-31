<?php

namespace App\Http\Controllers\VaccinationCenter;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\VaccinatedPerson;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitizenVerificationController extends Controller
{
    //this controller is used for verifing citizen using passcode
    public function index()
    {
        return view('vaccination-center.citizen-verification');
    }
    //return citizen detail for verification
    public function citizenDetail(Request $request)
    {
        $request->validate([
            'passcode' => 'required|numeric'
        ]);
        try {
            $citizen = Citizen::where('passcode', $request->passcode)->first();
            if (!$citizen) {
                throw new Exception('No record found', 400);
            }
            $htmlResponse = view('vaccination-center.partials.html-response.citizen-detail', ['citizen' => $citizen])->render();
            return response()->json([
                'success' => true,
                'html_response' => $htmlResponse,
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], ($exception->getCode() > 0) ? $exception->getCode() : 500);
        }
    }
    //
    public function verifyCitizen(Request $request)
    {
        try {
            $citizen = Citizen::where('passcode', $request->passcode)->first();
            if (!$citizen) {
                throw new Exception('Invalid Passcode', 500);
            }
            $vaccinationStatus = VaccinatedPerson::where('citizen_id', $citizen->citizen_id)->first();
            if (!$vaccinationStatus) {
                $verifyCitizen = new VaccinatedPerson();
                $verifyCitizen->citizen_id = $citizen->citizen_id;
                $verifyCitizen->vaccination_center_id = Auth::user()->vaccinationCenter->vaccination_center_id;
                $verifyCitizen->vaccination_date = Carbon::now()->format('Y-m-d');
                $verifyCitizen->is_vaccinated = false;
                $verifyCitizen->save();
            }
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while processing your request',
                'exception' => $exception->getMessage()
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Citizen Verified Succesfully'
        ]);
    }
}
