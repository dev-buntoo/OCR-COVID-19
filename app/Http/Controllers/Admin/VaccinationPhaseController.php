<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VaccinationPhase;
use Exception;
use Illuminate\Http\Request;

class VaccinationPhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccinationPhases = VaccinationPhase::all();
        // dd($vaccinationPhases);
        return view('admin.pages.vaccination-phases', ['vaccinationPhases' => $vaccinationPhases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaccinationPhase  $vaccinationPhase
     * @return \Illuminate\Http\Response
     */
    public function show(VaccinationPhase $vaccinationPhase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaccinationPhase  $vaccinationPhase
     * @return \Illuminate\Http\Response
     */
    public function edit(VaccinationPhase $vaccinationPhase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VaccinationPhase  $vaccinationPhase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VaccinationPhase $vaccinationPhase)
    {
        try {
            $phaseAge = $vaccinationPhase->minimum_age;
            $previousPhases = VaccinationPhase::where('minimum_age', '>', $phaseAge)->get();
            foreach ($previousPhases as $phase) {
                $phase->status = '1';
                $phase->save();
            }
            $vaccinationPhase->status = '1';
            $vaccinationPhase->save();
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong while processing your request",
                'exception' => $exception->getMessage(),
            ], 500);
        }
        return response()->json([
            'success' => false,
            'message' => "Phase Activated Succesfuly",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaccinationPhase  $vaccinationPhase
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaccinationPhase $vaccinationPhase)
    {
        //
    }
}
