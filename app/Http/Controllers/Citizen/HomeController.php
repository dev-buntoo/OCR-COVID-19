<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\VaccinatedPerson;
use App\Models\VaccinationPhase;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $alreadyRegistered = null;
        $eligible = null;
        $message = null;
        try {
            $citizenRecord = Citizen::where('citizen_id', Auth::user()->citizen->citizen_id)->where('passcode', '<>', null)->first();
            // dd($citizenRecord);
            if (!$citizenRecord) {
                $citizenAge = Carbon::parse(Auth::user()->date_of_birth)->age;
                $activePhase = VaccinationPhase::where('status', '1')->orderBy('vaccination_phase_id', 'desc')->first();
                if (!$activePhase) {
                    $eligible = false;
                    throw new Exception('No Vaccination Phase is active right now.');
                }
                $eligible = $citizenAge >= $activePhase->minimum_age;
                if (!$eligible)
                    throw new Exception("You are not eligible for the vaccination. Citizens of age '$activePhase->minimum_age' and above are eligible for vaccination only. Thank you!");
            } else {
                $alreadyRegistered = true;
                $eligible = false;
                $text = "Respected Citizen! You are resgistered for vaccination and your secret passcode is '$citizenRecord->passcode'. Please visit nearest vaccination center for vaccination. Thank You. ";
                throw new Exception($text);
            }
        } catch (Exception $exception) {
            $eligible = false;
            $message = $exception->getMessage();
        }
        return view('citizen.home', ['alreadyRegistered' => $alreadyRegistered, 'eligible' => $eligible, 'message' => $message, 'citizenRecord' => $citizenRecord]);
    }
}
