<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParamedicStaff;
use App\Models\VaccinationCenter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ParamedicStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (request()->ajax()) {
        //     $staff = ParamedicStaff::latest();
        //     return DataTables::of($staff)
        //         ->addColumn('action', function ($data) {
        //             $action = '<a href="javascript:void(0)" data-city-id="' . $data->city_id . '" class="fa fa-pencil m-2 btn-link edit-city" role="button"></a><a href="javascript:void(0)"onclick="delCity(' . $data->city_id . ')" class="fa fa-trash m-2"></a>';
        //             return $action;
        //         })->rawColumns(['action'])
        //         ->make(true);
        // }
        $vaccinationCenters = VaccinationCenter::latest()->get();
        return view('admin.pages.paramedic-staff', ['vaccinationCenters' => $vaccinationCenters]);
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
     * @param  \App\Models\ParamedicStaff  $paramedicStaff
     * @return \Illuminate\Http\Response
     */
    public function show(ParamedicStaff $paramedicStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParamedicStaff  $paramedicStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(ParamedicStaff $paramedicStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParamedicStaff  $paramedicStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParamedicStaff $paramedicStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParamedicStaff  $paramedicStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParamedicStaff $paramedicStaff)
    {
        //
    }
}
