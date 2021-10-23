<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\VaccinatedPerson;
use App\Services\GeneratePasscode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VaccinationRegistration extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try{
            $alreadyRegistered = VaccinatedPerson::where('citizen_id', Auth::user()->user_id)->first();
            if($alreadyRegistered){
                throw new Exception("You are already registored for vaccination", 400);
            }
            // generating unique passcode for the user
            $generatePasscode = new GeneratePasscode(Auth::user()->citizen->citizen_id);
            $passcode = $generatePasscode->generatePasscodeForVaccination();
            $citizen = Auth::user()->citizen;
            $citizen->passcode = $passcode;
            $citizen->save();
            return redirect()->back();
        }
        catch (Exception $exception){
            dd($exception);
        }
    }
}
