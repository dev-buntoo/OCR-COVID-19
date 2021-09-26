<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\VaccinationCenter;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VaccinationCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $centers = VaccinationCenter::latest();
            return DataTables::of($centers)
                ->addColumn('action', function ($data) {
                    $action = '<a href="javascript:void(0)" data-city-id="' . $data->vaccination_center_id . '" class="fa fa-pencil m-2 btn-link edit-city" role="button"></a><a href="javascript:void(0)"onclick="delCity(' . $data->vaccination_center_id . ')" class="fa fa-trash m-2"></a>';
                    return $action;
                })->rawColumns(['action'])
                ->make(true);
        }
        $cities = City::latest()->get();
        return view('admin.pages.vaccination-centers', ['cities' => $cities]);
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
        // return($request);
        $request->validate([
            'name' => 'required|string|max:250',
            'city' => 'required|exists:cities,city_id',
            'address'=>'required|string|max:250'
        ]);
        try {
            $center = new VaccinationCenter();
            $center->name = $request->name;
            $center->address = $request->address;
            $center->save();
            return response()->json([
                'success' => true,
                'message' => 'City Added Succesfuly',
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'City Adding Failed',
                // 'exception' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function show(VaccinationCenter $vaccinationCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(VaccinationCenter $vaccinationCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VaccinationCenter $vaccinationCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaccinationCenter $vaccinationCenter)
    {
        //
    }
}
