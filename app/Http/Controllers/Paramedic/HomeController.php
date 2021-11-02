<?php

namespace App\Http\Controllers\Paramedic;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\MedicalRecord;
use App\Models\VaccinatedPerson;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('paramedic.home');
    }
    public function verifyPasscode(Request $request)
    {
        $request->validate([
            'passcode' => 'required|numeric|exists:citizens,passcode'
        ]);
        try {
            $citizen = Citizen::where('passcode', $request->passcode)->first();
            $beingVaccinated = VaccinatedPerson::where('citizen_id', $citizen->citizen_id)->where('vaccination_center_id', Auth::user()->paramedicStaff->vaccination_center_id)->first();
            if (!$beingVaccinated) {
                throw new Exception("Citizen is being vaccinated at another center");
            }
            // dd($beingVaccinated);
            if ($beingVaccinated->paramedic_staff_id) {
                throw new Exception('User has been vaccinated or being vaccinated');
            }
            $beingVaccinated->paramedic_staff_id = Auth::user()->paramedicStaff->paramedic_staff_id;
            $beingVaccinated->save();
            return response()->json([
                'success' => true,
                'passcode' => $request->passcode,
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                // 'message' => 'Something went worng while processing your request'
                'message' => $exception->getMessage()
            ], 500);
        }
    }
    //
    public function vaccinating()
    {
        $citizens = VaccinatedPerson::with('citizen')
            ->where('paramedic_staff_id', Auth::user()->paramedicStaff->paramedic_staff_id)
            ->where('vaccination_center_id', Auth::user()->paramedicStaff->vaccination_center_id)
            ->where('is_vaccinated', false)
            ->get();
        return view('paramedic.vaccinating', ['citizens' => $citizens]);
    }
    public function medicalRecord($passcode)
    {
        $citizen = Citizen::where('passcode', $passcode)->first();
        if (!$citizen) {
            abort(404);
        }
        return view('paramedic.medical-record', ['citizen' => $citizen]);
    }
    public function storeMedicalRecord(Request $request, $passcode)
    {
        $request->validate([
            'disease' => 'required|string'
        ]);
        $citizen = Citizen::where('passcode', $passcode)->first();
        if (!$citizen) {
            abort(404);
        }
        $medicalRec = new MedicalRecord();
        $medicalRec->disease_name = $request->disease;
        $medicalRec->citizen_id = $citizen->citizen_id;
        $medicalRec->save();
        return redirect(route('paramedic.vaccinating'));
    }
    public function vaccinateCitizen(Request $request)
    {
        $citizen = Citizen::where('passcode', $request->passcode)->first();
        !$citizen ? abort(404) : null;
        $vaccinated = VaccinatedPerson::where('citizen_id', $citizen->citizen_id)->first();
        !$vaccinated ? abort(404) : null;
        $vaccinated->is_vaccinated = true;
        $vaccinated->vaccination_time = Carbon::now()->format('H:i:s');
        $vaccinated->save();
        return redirect(route('paramedic.vaccinated'));
    }
    public function vaccinated()
    {
        $citizens = VaccinatedPerson::with('citizen')
            ->where('paramedic_staff_id', Auth::user()->paramedicStaff->paramedic_staff_id)
            ->where('vaccination_center_id', Auth::user()->paramedicStaff->vaccination_center_id)
            ->where('is_vaccinated', true)
            ->latest()
            ->get();
        return view('paramedic.vaccinated', ['citizens' => $citizens]);
    }
    public function addReaction($passcode)
    {
        $citizen = Citizen::where('passcode', $passcode)->first();
        if (!$citizen) {
            abort(404);
        }
        return view('paramedic.reaction', ['citizen' => $citizen]);
    }
    public function storeReaction(Request $request, $passcode)
    {
        $request->validate([
            'reaction' => 'required|string'
        ]);
        $citizen = Citizen::where('passcode', $passcode)->first();
        if (!$citizen) {
            abort(404);
        }
        $storeReaction = VaccinatedPerson::where('citizen_id', $citizen->citizen_id)->first();
        $storeReaction->any_reaction = true;
        $storeReaction->reaction_detail = $request->reaction;
        $storeReaction->save();
        return redirect(route('paramedic.vaccinated'));
    }
}
